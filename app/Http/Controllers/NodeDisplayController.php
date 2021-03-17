<?php

namespace App\Http\Controllers;

use App\Models\DisplayContent;
use App\Models\DisplayNode;
use App\Models\NodeContent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NodeDisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $displayNodes = DisplayNode::orderBy('created_at','desc')->paginate(6);
        return view('pages.available-displays', compact('displayNodes'));

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showUserNodes ()
    {
        $nodes = User::find(Auth::user()->id)->nodes;
        return view ('pages.user-display-nodes', compact('nodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $node = DisplayNode::findOrFail($id);
        //dd($node);
        $uploadedContents = DisplayContent::where('user_id', Auth::user()->id)->get();
        return view('pages.node-content-upload', compact('node', 'uploadedContents'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadToNode (Request $request, $id){

        $node = DisplayNode::findOrFail($id);
        $content = DisplayContent::findOrFail($request['node_content']);

        $NodeContent = new NodeContent();
        $NodeContent->display_node_id = $node->id;
        $NodeContent->display_content_id = $content->id;
        $NodeContent->save();

        return redirect()->route('allDisplays');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $selectedNode = DisplayNode::findOrFail($id);

        return view('pages.edit-node', compact('selectedNode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'node_title' => 'required|max:255',
            'node_location' => 'required',
            'node_description' => 'required'
        ]);

        $nodeDisplay = DisplayNode::find($id);
        $nodeDisplay->node_title = $validatedData['node_title'];
        $nodeDisplay->node_location = $validatedData['node_location'];
        $nodeDisplay->node_description = $validatedData['node_description'];
        $nodeDisplay->node_mode = $request['node_mode'];
        $nodeDisplay->user_id = Auth::user()->id;
        $nodeDisplay->save();

        return redirect()->route('userDisplays');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
