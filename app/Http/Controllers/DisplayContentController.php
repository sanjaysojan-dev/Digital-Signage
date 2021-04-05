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
        $userContent = User::find(Auth::user()->id)->content;
        return view('pages.user-content-upload', compact('userContent'));
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
            'contentTitle' => 'required|max:255',
            'contentDescription' => 'required',
            'image_upload' => 'image|nullable| max:1999'
        ]);

        if ($request->hasFile('image_upload')) {

            $fullFileName = $request->file('image_upload')->getClientOriginalName();
            $filename = pathinfo($fullFileName, PATHINFO_FILENAME);
            $fileExtension = $request->file('image_upload')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $fileExtension;
            $request->file('image_upload')->storeAs('public/images', $fileNameToStore);

            $image = new Image(['filename' => $fileNameToStore]);

            $displayContent = new DisplayContent();
            $displayContent->content_title = $validatedData['contentTitle'];
            $displayContent->content_description = $validatedData['contentDescription'];
            $displayContent->user_id = Auth::user()->id;

            $displayContent->save();
            $displayContent->image()->save($image);

        } else {
            //Session header saying that no image was selected
            return redirect()->route('userContent');

        }

        return redirect()->route('userContent');
    }

    /**
     *
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = DisplayContent::findOrFail($id);
        return view('pages.edit-content', compact('content'));
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
            'contentTitle' => 'required|max:255',
            'contentDescription' => 'required',
            'image_upload' => 'image|nullable| max:1999'
        ]);

        $updatedContent = DisplayContent::findOrFail($id);
        $updatedContent->content_title = $validatedData['contentTitle'];
        $updatedContent->content_description = $validatedData['contentDescription'];

        if ($request->hasFile('image_upload')) {
            $fullFileName = $request->file('image_upload')->getClientOriginalName();
            $filename = pathinfo($fullFileName, PATHINFO_FILENAME);
            $fileExtension = $request->file('image_upload')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $fileExtension;

            unlink('storage/images/' . $updatedContent->image->filename);
            Image::where('imageable_type', 'App\Models\DisplayContent')->where('imageable_id', $updatedContent->id)->delete();


            $image = new Image(['filename' => $fileNameToStore]);
            $updatedContent->image()->save($image);
            $request->file('image_upload')->storeAs('public/images', $fileNameToStore);
        }

        $updatedContent->save();
        return redirect()->route('userContent');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $selectedNode = DisplayContent::findOrFail($id);
        unlink('storage/images/' . $selectedNode->image->filename);

        foreach ($selectedNode->nodes as $node){
            $node->user->notify(new EmailNotification(EmailSubjectTypes::RemovalOfContent,
                $selectedNode->content_title.EmailMessages::RemovalOfContentMessage, $node->id, Auth::user()));
        }

        $selectedNode->delete();

        return redirect()->route('userContent');
    }


}