<?php

namespace Tests\Unit;

use App\Http\Controllers\DisplayNodeController;
use App\Models\DisplayNode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class DisplayNodeController1Test extends TestCase
{
    use WithFaker;


    public function test_store()
    {
        $user = User::factory()->create([
            'id' => 1,
            'email' => 'taylor@laravel.com',
        ]);

        Auth::login($user);

        $request = Request::create('/storeDisplay', 'POST', [
            'node_title' => 'Test Node 1',
            'node_location' => 'Location',
            'node_description' => 'Description',
            'node_mode' => 'Landscape'
        ]);

        $controller = new DisplayNodeController();
        $response = $controller->store($request);

        $node = DisplayNode::where('node_title', 'Test Node 1')
            ->where('node_location', 'Location');

        $this->assertNotNull($node);
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_index () {

        Auth::login(User::find(1));

        $response= $this->call('GET', '/allDisplays');
        $displayNodes = DisplayNode::orderBy('created_at', 'desc')->paginate(6);
        $response->assertViewHas('displayNodes', $displayNodes);
    }

    public function test_showUserNodes()
    {
        Auth::login(User::find(1));

        $response= $this->call('GET', '/userDisplays');
        $nodes = User::find(1)->nodes;
        $response->assertViewHas('nodes', $nodes);
    }

    public function test_show()
    {
        Auth::login(User::find(1));
        $response= $this->call('GET', '/showNode/1',);
        $node = DisplayNode::find(1);
        $response->assertViewHas('node', $node);
    }


    public function test_edit () {

        Auth::login(User::find(1));

        $response= $this->call('GET', '/editNodeDisplay/1');
        $selectedContent = DisplayNode::find(1);
        $response->assertViewHas('selectedNode', $selectedContent);
    }

    public function test_update (){
        Auth::login(User::find(1));

        $request = Request::create('/updateNodeDisplay', 'PUT', [
            'node_title' => 'Test Node 1',
            'node_location' => 'Location',
            'node_description' => 'Modified',
            'node_mode' => 'Landscape'
        ]);

        $controller = new DisplayNodeController();
        $response = $controller->update($request,1);

        $node = DisplayNode::where('id', 1)->where('node_description', 'Modified');
        $this->assertNotNull($node);
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_destroy (){
        Auth::login(User::find(1));
        $controller = new DisplayNodeController();
        $response = $controller->destroy(1);
        $node = DisplayNode::find(1);
        $this->assertNull($node);
        $this->assertEquals(302, $response->getStatusCode());
    }
}
