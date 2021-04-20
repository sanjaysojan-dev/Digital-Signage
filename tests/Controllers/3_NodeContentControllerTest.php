<?php

namespace Tests\Feature;

use App\Http\Controllers\NodeContentController;
use App\Models\DisplayContent;
use App\Models\DisplayNode;
use App\Models\NodeContent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class NodeContentControllerTest extends TestCase
{
    public function test_uploadToNode()
    {
        User::factory()->create([
            'id' => 1,
            'email' => 'taylor@laravel.com',
        ]);

        Auth::login(User::find(1));
        $node = DisplayNode::factory()->create();
        $content = DisplayContent::factory()->create();

        $controller = new NodeContentController();

        $request = Request::create('/uploadContent/1', 'POST', [
            'node_content' => 1
        ]);

        $response = $controller->uploadToNode($request, 1);
        $manyToMany = NodeContent::where('display_node_id', 1)
            ->where('display_content_id', 1);

        $this->assertNotNull($manyToMany);
        $this->assertEquals(302, $response->getStatusCode());

    }

    public function test_removeContentFromNode (){
        Auth::login(User::find(1));
        $controller = new NodeContentController();
        $response = $controller->removeContentFromNode(1, 1);
        $manyToMany = NodeContent::where('display_node_id', 1)
            ->where('display_content_id', 1);

        $this->assertEquals(302, $response->getStatusCode());
        $this->artisan('migrate:refresh');
    }

}
