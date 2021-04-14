<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DisplayNodeTest extends DuskTestCase
{
    use WithFaker;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_user_create_node()
    {
        $user = User::factory()->create([
            'id' => 3,
            'email' => $this->faker->unique()->safeEmail,
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs(User::find(3))
                ->visit('/userDisplays')
                ->type('node_title', 'Test Node 1')
                ->type('node_location', 'location')
                ->type('node_description', 'description')
                ->select('node_mode', 'Portrait')
                ->press('CREATE')
                ->assertSee('Node created')
                ->assertPathIs('/userDisplays')
                ->pause(2000)
                ->type('node_title', 'Test Node 2')
                ->type('node_location', 'location')
                ->type('node_description', 'description')
                ->select('node_mode', 'Landscape')
                ->press('CREATE')
                ->assertSee('Node created')
                ->assertPathIs('/userDisplays')
                ->pause(2000);
        });
    }

    /**
     * @throws \Throwable
     */
    public function test_user_delete_node()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/userDisplays')
                ->press('Delete2')
                ->assertSee('Node Deleted')
                ->assertPathIs('/userDisplays')
                ->pause(2000);
        });
    }

    /**
     * @throws \Throwable
     */
    public function test_user_edit_node()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/userDisplays')
                ->press('Edit1')
                ->type('node_title', 'Test Node 1')
                ->type('node_location', 'location')
                ->type('node_description', 'Modified')
                ->select('node_mode', 'Portrait')
                ->press('UPDATE')
                ->assertSee('Node updated')
                ->assertPathIs('/userDisplays')
                ->pause(2000);
        });
    }

    /**
     * @throws \Throwable
     */
    public function test_view_all_available_node()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                ->visit('/allDisplays')
                ->assertSee('Deployed Nodes')
                ->assertPathIs('/allDisplays');
        });
    }

    /**
     * @throws \Throwable
     */
    public function test_select_node()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(User::find(2))
                ->visit('/allDisplays')
                ->clickLink('Test Node 1')
                ->assertSee('Selected Node')
                ->assertPathIs('/showNode/1');
        });
    }

    /**
     * @throws \Throwable
     */
    public function test_upload_content()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/showNode/1')
                ->press('Post to Node')
                ->assertSee('The selected content has been uploaded')
                ->assertPathIs('/showNode/1');
        });
    }

    /**
     * @throws \Throwable
     */
    public function test_view_imageslider()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/imageSlider/1')
                ->assertPathIs('/imageSlider/1');
        });
    }

    /**
     * @throws \Throwable
     */
    public function test_remove_content()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/showNode/1')
                ->press('Remove1')
                ->assertSee('Content removed from Node')
                ->assertPathIs('/showNode/1');
        });
    }

    /**
     * @throws \Throwable
     */
    public function test_flag_node()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/showNode/1')
                ->press('Flag Display')
                ->assertSee('Node has been flagged')
                ->assertPathIs('/showNode/1');
        });
    }

    /**
     * @throws \Throwable
     */
    public function test_view_imageslider_2()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/imageSlider/1')
                ->assertSee('Content yet to be uploaded - Upload content and try again!')
                ->assertPathIs('/showNode/1');
        });
    }

}
