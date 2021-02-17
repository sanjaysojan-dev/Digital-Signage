<?php

namespace App\Http\Controllers;

use App\Models\DisplayNode;
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
        return view('pages.node-content-upload', compact('node'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
