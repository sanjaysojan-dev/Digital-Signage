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

    public function test_user_delete_node()
    {
        $this->browse(function (Browser $browser)  {
            $browser
                ->visit('/userDisplays')
                ->press('Delete2')
                ->assertSee('Node Deleted')
                ->assertPathIs('/userDisplays')
                ->pause(2000);
        });
    }

    public function test_user_edit_node()
    {
        $this->browse(function (Browser $browser)  {
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
}
