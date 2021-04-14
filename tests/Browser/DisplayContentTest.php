<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DisplayContentTest extends DuskTestCase
{

    use WithFaker;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_user_create_content()
    {
        $user = User::factory()->create([
            'id' => 2,
            'email' => $this->faker->unique()->safeEmail,
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs(User::find(2))
                ->visit('/userContent')
                ->type('content_title', 'Content 1')
                ->type('content_description', 'description')
                //->attach('image_upload', '\test_images\forest.png')
                ->attach('image_upload', storage_path('test_images/forest.jpg'))
                ->press('UPLOAD')

                ->pause(2000)
                ->visit('/userContent')
                ->type('content_title', 'Content 2')
                ->type('content_description', 'description')
                //->attach('image_upload', '\test_images\forest.png')
                ->attach('image_upload', storage_path('test_images/laptop.jpg'))
                ->press('UPLOAD')
                ->assertSee('Content uploaded')
                ->pause(2000)
                ->assertPathIs('/userContent');
        });
    }


    public function test_user_delete_content()
    {
        $this->browse(function (Browser $browser)  {
            $browser->visit('/userContent')
                ->type('content_title', 'Content 1')
                ->type('content_description', 'description')
                ->press('Delete2')
                ->assertSee('Content Deleted')
                ->pause(2000)
                ->assertPathIs('/userContent');
        });
    }

    public function test_user_edit_content()
    {
        $this->browse(function (Browser $browser)  {
            $browser
                ->visit('/userContent')
                ->press('Edit1')
                ->type('content_title', 'Test Node 1')
                ->type('content_description', 'Modified')
                ->attach('image_upload', storage_path('test_images/laptop.jpg'))
                ->press('UPDATE')
                ->assertSee('Content Updated')
                ->assertPathIs('/userContent')
                ->pause(2000);
        });
    }
}
