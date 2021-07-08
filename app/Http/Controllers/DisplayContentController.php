<?php

namespace App\Http\Controllers;

use App\Enums\EmailMessages;
use App\Enums\EmailSubjectTypes;
use App\Models\DisplayContent;
use App\Models\DisplayNode;
use App\Models\Image;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayContentController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showUserContent()
    {
        $userContent = User::find(Auth::user()->id)->contents;
        return view('pages.user-content-upload', compact('userContent'));
    }


    public function showSelectedContent ($node_id, $content_id){

        $node = DisplayNode::findOrFail($node_id);
        $content = DisplayContent::findOrFail($content_id);

        if (((Auth::user()->id == $content->user_id) || (Auth::user()->id == $node->user_id))){

            $nodeContents = $node->contents;
            $allNodeContent = $nodeContents->filter(function ($value) use ($content_id){

                if ($value['id'] == $content_id) {
                    return true;
                }
            });
            $allNodeContent->all();
            return view('pages.image-slider', compact('allNodeContent'));
        } else {
            return redirect()->route('showNode', ['id' => $node_id]);
        }
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
            'content_title' => 'required|max:255',
            'content_description' => 'required',
            'image_upload' => 'image'
        ]);

        if (Auth::user()->can('create', DisplayContent::class)) {

            $fullFileName = $request->file('image_upload')->getClientOriginalName();
            $filename = pathinfo($fullFileName, PATHINFO_FILENAME);
            $fileExtension = $request->file('image_upload')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $fileExtension;
            $request->file('image_upload')->storeAs('public/images', $fileNameToStore);

            $image = new Image(['filename' => $fileNameToStore]);

            $displayContent = new DisplayContent();
            $displayContent->content_title = $validatedData['content_title'];
            $displayContent->content_description = $validatedData['content_description'];
            $displayContent->user_id = Auth::user()->id;

            $displayContent->save();
            $displayContent->image()->save($image);

            session()->flash('session_message', "Content uploaded");
            return redirect()->route('userContent');

        } else {
            session()->flash('session_message', "You don't have to upload a content");
            return redirect()->route('userContent');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selectedContent = DisplayContent::findOrFail($id);
        if (Auth::user()->can('update', $selectedContent)) {
            return view('pages.edit-content', compact('selectedContent'));
        } else {
            session()->flash('session_message', "You don't have authentication to edit content");
            return redirect()->route('userContent');
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
            'content_title' => 'required|max:255',
            'content_description' => 'required',
            'image_upload' => 'image|nullable| max:1999'
        ]);

        $selectedContent = DisplayContent::findOrFail($id);

        if (Auth::user()->can('update', $selectedContent)) {
            $selectedContent->content_title = $validatedData['content_title'];
            $selectedContent->content_description = $validatedData['content_description'];

            if ($request->hasFile('image_upload')) {
                $fullFileName = $request->file('image_upload')->getClientOriginalName();
                $filename = pathinfo($fullFileName, PATHINFO_FILENAME);
                $fileExtension = $request->file('image_upload')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $fileExtension;

                unlink('storage/images/' . $selectedContent->image->filename);
                Image::where('imageable_type', 'App\Models\DisplayContent')->where('imageable_id', $selectedContent->id)->delete();


                $image = new Image(['filename' => $fileNameToStore]);
                $selectedContent->image()->save($image);
                $request->file('image_upload')->storeAs('public/images', $fileNameToStore);
            }

            $selectedContent->save();
            session()->flash('session_message', "Content Updated");
            return redirect()->route('userContent');
        } else {
            session()->flash('session_message', "You don't have authentication to update selected content");
            return redirect()->route('userContent');
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
        $selectedContent = DisplayContent::findOrFail($id);

        if (Auth::user()->can('delete', $selectedContent)) {
            unlink('storage/images/' . $selectedContent->image->filename);
            foreach ($selectedContent->nodes as $node) {
                $node->user->notify(new EmailNotification(EmailSubjectTypes::RemovalOfContent,
                    $selectedContent->content_title . EmailMessages::RemovalOfContentMessage, $node->id, Auth::user()));
            }

            $selectedContent->delete();
            session()->flash('session_message', "Content Deleted");
            return redirect()->route('userContent');
        } else {
            session()->flash('session_message', "You don't have authentication to delete this content");
            return redirect()->route('userContent');
        }
    }


}
