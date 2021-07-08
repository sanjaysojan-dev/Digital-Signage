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

        // checks to see if user has authorisation to upload to the node
        if (Auth::user()->can('create', NodeContent::class)){

            //checks if the content has already been uploaded
            if ($manyToMany->contains('display_content_id', $content['id'])) {
                session()->flash('session_message', 'The selected content has already been uploaded');
                return redirect()->route('showNode', ['id' => $id]);
            } else {

                //Creates a new many to many relationship
                $NodeContent = new NodeContent();
                $NodeContent->display_node_id = $node->id;
                $NodeContent->display_content_id = $content->id;
                $NodeContent->save();

                User::find($node['user_id'])->notify(new EmailNotification(EmailSubjectTypes::UploadOfContent,
                    $content['content_title'].EmailMessages::UploadOfContentMessage, $id,Auth::user()));
            }

            session()->flash('session_message', 'The selected content has been uploaded');
            return redirect()->route('showNode', ['id' => $id]);
        } else {
            //redirects back to the previous page if the user does not have authorisation
            session()->flash('session_message', "You don't have authentication to upload to Node");
            return redirect()->route('showNode', ['id' => $id]);
        }

    }


    /**
     * @param $content_id
     * @param $node_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeContentFromNode($content_id, $node_id)
    {
        $displayContent = DisplayContent::findOrFail($content_id);
        $displayNode = DisplayNode::findOrFail($node_id);

        // Checks if the user is either the node owner or content owner of selected content
        if (((Auth::user()->id == $displayContent->user_id) || (Auth::user()->id == $displayNode->user_id))) {

            $removeContent = NodeContent::where('display_node_id', $node_id)->
            where('display_content_id', $content_id)->get();

            foreach ($removeContent as $content) {
                $displayNode->user->notify(new EmailNotification(EmailSubjectTypes::RemovalOfContent,
                    $displayContent->content_title.EmailMessages::RemovalOfContentMessage, $node_id, Auth::user()));
                $content->delete();
            }
            session()->flash('session_message', "Content removed from Node");
            return redirect()->route('showNode', ['id' => $node_id]);
        } else {
            //redirects back to the previous page if the user does not have authorisation
            session()->flash('session_message', "You don't have authentication to delete content from this node");
            return redirect()->route('showNode', ['id' => $node_id]);
        }
    }
}



