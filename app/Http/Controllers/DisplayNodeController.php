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

        $nodeDisplay = new DisplayNode();
        $nodeDisplay->node_title = $validatedData['node_title'];
        $nodeDisplay->node_location = $validatedData['node_location'];
        $nodeDisplay->node_description = $validatedData['node_description'];
        $nodeDisplay->node_mode = $request['node_mode'];
        $nodeDisplay->user_id = Auth::user()->id;
        $nodeDisplay->save();

        return redirect()->route('userDisplays');

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
        //dd($node);

        if (Auth::user()->id == $node->user_id) {
            $contentToDisplay = $node->contents;
        } else {
            $nodeContents = $node->contents;
            //$contentToDisplay = $nodeContents->where('user_id', Auth::user()->id)->get();
            $contentToDisplay = $nodeContents->filter(function ($value) {
                if ($value['user_id'] == Auth::user()->id) {
                    return true;
                }
            });

            $contentToDisplay->all();
            //dd($contentToDisplay);
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

        $displayNode = DisplayNode::find($id);

        if (Auth::user()->can('update', $displayNode)) {
            $displayNode->node_title = $validatedData['node_title'];
            $displayNode->node_location = $validatedData['node_location'];
            $displayNode->node_description = $validatedData['node_description'];
            $displayNode->node_mode = $request['node_mode'];
            $displayNode->user_id = Auth::user()->id;
            $displayNode->save();
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
        $display = DisplayNode::findOrFail($id);


        if (Auth::user()->can('delete', $display)) {

            foreach ($display->contents as $content) {
                User::find($content->user_id)->notify(new EmailNotification(EmailSubjectTypes::DeletionOfNode,
                    EmailMessages::DeletionOfNodeMessage, $id, Auth::user()));
            }

            $display->delete();
            session()->flash('session_message', "Node Deleted");
            return redirect()->route('userDisplays');
        } else {
            session()->flash('session_message', "You don't have authentication to delete this node");
            return redirect()->route('userDisplays');
        }
    }
}
