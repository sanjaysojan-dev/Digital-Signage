<?php

namespace Tests\Unit;


use App\Http\Controllers\DisplayContentController;
use App\Http\Controllers\DisplayNodeController;
use App\Models\DisplayContent;
use App\Models\DisplayNode;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DisplayContentController2Test extends TestCase
{
    use WithFaker;


    public function test_store()
    {
        User::factory()->create([
            'id' => 1,
            'email' => 'taylor@laravel.com',
        ]);

        Auth::login(User::find(1));

        $request = Request::create ('/storeContent', 'POST', [
            'content_title' => 'Test Content 1',
            'content_description' => 'Description',
        ]);
        $file = new UploadedFile(storage_path('test_images\laptop.jpg'), 'laptop.jpg');
        $request->files->set('image_upload', $file);
        $controller = new DisplayContentController();
        $response = $controller->store($request);

        $content = DisplayContent::where('content_title', 'Test Content 1')
            ->where('content_description', 'Description');

        $this->assertNotNull($content);
        $this->assertEquals(302, $response->getStatusCode());
    }


    public function test_edit () {

        Auth::login(User::find(1));

        $response= $this->call('GET', '/editNodeContent/1');
        $selectedContent = DisplayContent::find(1);
        $response->assertViewHas('selectedContent', $selectedContent);
    }


    public function test_update (){

        Auth::login(User::find(1));
        $request = Request::create('/updateNodeDisplay', 'PUT', [
            'content_title' => 'Test Content 1',
            'content_description' => 'Modified',
        ]);

        $controller = new DisplayContentController();
        $response = $controller->update($request,1);

        $node = DisplayContent::where('id', 1)->where('content_description', 'Modified');
        $this->assertNotNull($node);
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function test_destroy (){
        Auth::login(User::find(1));

        $controller = new DisplayContentController();
        $response = $controller->destroy(1);
        $content = DisplayContent::find(1);
        $this->assertNull($content);
        $this->assertEquals(302, $response->getStatusCode());
        $this->artisan('migrate:refresh');
    }

}
