<?php

namespace App\Http\Controllers;

use App\Enums\EmailMessages;
use App\Enums\EmailSubjectTypes;
use App\Models\DisplayContent;
use App\Models\DisplayNode;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class DisplayNodeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $displayNodes = DisplayNode::orderBy('created_at', 'desc')->paginate(6);
            return view('pages.available-displays', compact('displayNodes'));

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showUserNodes()
    {
        $nodes = User::find(Auth::user()->id)->nodes;
        return view('pages.user-display-nodes', compact('nodes'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showAllNodeContent($id)
    {

        $allNodeContent = DisplayNode::find($id);

        if ($allNodeContent != null) {
            if (count($allNodeContent->contents) > 0) {
                $allNodeContent = $allNodeContent->contents;
                return view('pages.image-slider', compact('allNodeContent'));
            }
            session()->flash('session_message', 'Content yet to be uploaded - Upload content and try again!');
            return redirect()->route('showNode', ['id' => $id]);
        }
        session()->flash('session_message', 'Node does not exist or node may have been removed!');
        return redirect()->route('allDisplays');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'node_title' => 'required|max:255',
            'node_location' => 'required',
            'node_description' => 'required'
        ]);

        if (Auth::user()->can('create', DisplayNode::class)) {
            $nodeDisplay = new DisplayNode();
            $nodeDisplay->node_title = $validatedData['node_title'];
            $nodeDisplay->node_location = $validatedData['node_location'];
            $nodeDisplay->node_description = $validatedData['node_description'];
            $nodeDisplay->node_mode = $request['node_mode'];
            $nodeDisplay->user_id = Auth::user()->id;
            $nodeDisplay->save();

            session()->flash('session_message', "Node created");
            return redirect()->route('userDisplays');
        } else {
            session()->flash('session_message', "You don't have authentication to create a node");
            return redirect()->route('userDisplays');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $node = DisplayNode::findOrFail($id);

        if (Auth::user()->can('view',$node)) {
            $contentToDisplay = $node->contents;
        } else {
            $nodeContents = $node->contents;
            $contentToDisplay = $nodeContents->filter(function ($value) {
                if ($value['user_id'] == Auth::user()->id) {
                    return true;
                }
            });
            $contentToDisplay->all();
        }

        $userContents = DisplayContent::where('user_id', Auth::user()->id)->get();//All user Contents
        return view('pages.node-content-upload', compact('node', 'userContents', 'contentToDisplay'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selectedNode = DisplayNode::findOrFail($id);
        if (Auth::user()->can('update', $selectedNode)) {
            return view('pages.edit-node', compact('selectedNode'));
        } else {
            session()->flash('session_message', "You don't have authentication to edit this node");
            return redirect()->route('userDisplays');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'node_title' => 'required|max:255',
            'node_location' => 'required',
            'node_description' => 'required'
        ]);

        $selectedNode = DisplayNode::find($id);

        if (Auth::user()->can('update', $selectedNode)) {
            $selectedNode->node_title = $validatedData['node_title'];
            $selectedNode->node_location = $validatedData['node_location'];
            $selectedNode->node_description = $validatedData['node_description'];
            $selectedNode->node_mode = $request['node_mode'];
            $selectedNode->user_id = Auth::user()->id;
            $selectedNode->save();
            session()->flash('session_message', "Node updated");
            return redirect()->route('userDisplays');
        } else {
            session()->flash('session_message', "You don't have authentication to update this node");
            return redirect()->route('userDisplays');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $selectedNode = DisplayNode::findOrFail($id);

        if (Auth::user()->can('delete', $selectedNode)) {

            foreach ($selectedNode->contents as $content) {
                User::find($content->user_id)->notify(new EmailNotification(EmailSubjectTypes::DeletionOfNode,
                    EmailMessages::DeletionOfNodeMessage, $id, Auth::user()));
            }

            $selectedNode->delete();
            session()->flash('session_message', "Node Deleted");
            return redirect()->route('userDisplays');
        } else {
            session()->flash('session_message', "You don't have authentication to delete this node");
            return redirect()->route('userDisplays');
        }
    }

    /**
     *
     */
    public function flagDisplay ($id){

        $selectedNode = DisplayNode::findOrFail($id);

        User::find($selectedNode->user_id)->notify(new EmailNotification(EmailSubjectTypes::DisplayFlagged,
            "Node ".$id.EmailMessages::DisplayFlaggedMessage, $id, Auth::user()));

        session()->flash('session_message', "Node has been flagged.");
        return redirect()->route('showNode', ['id' => $id]);
    }
}
