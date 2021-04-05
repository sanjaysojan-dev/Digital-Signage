<?php

namespace App\Http\Controllers;

use App\Enums\EmailMessages;
use App\Enums\EmailSubjectTypes;
use App\Models\DisplayContent;
use App\Models\DisplayNode;
use App\Models\NodeContent;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NodeContentController extends Controller
{


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadToNode(Request $request, $id)
    {

        $node = DisplayNode::findOrFail($id);
        $content = DisplayContent::findOrFail($request['node_content']);

        $manyToMany = NodeContent::where('display_node_id', $id)->get();

        if ($manyToMany->contains('display_content_id', $content['id'])) {
            $message =  'The selected content has already been uploaded';
            session()->flash('session_message', $message);
            return redirect()->route('showNode', ['id' => $id]);
        } else {
            $NodeContent = new NodeContent();
            $NodeContent->display_node_id = $node->id;
            $NodeContent->display_content_id = $content->id;
            $NodeContent->save();

            User::find($node['user_id'])->notify(new EmailNotification(EmailSubjectTypes::UploadOfContent,
                $content['content_title'].EmailMessages::UploadOfContentMessage, $id,Auth::user()));
        }

        return redirect()->route('showNode', ['id' => $id]);
    }


    /**
     * @param $content_id
     * @param $node_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeContentFromNode($content_id, $node_id)
    {

        $removeContent = NodeContent::where('display_node_id', $node_id)->
        where('display_content_id', $content_id)->get();

        foreach ($removeContent as $content) {
            DisplayNode::find($node_id)->user->notify(new EmailNotification(EmailSubjectTypes::RemovalOfContent,
                DisplayContent::find($content_id)->content_title.EmailMessages::RemovalOfContentMessage, $node_id, Auth::user()));
            $content->delete();
        }

        return redirect()->route('showNode', ['id' => $node_id]);

    }



}
