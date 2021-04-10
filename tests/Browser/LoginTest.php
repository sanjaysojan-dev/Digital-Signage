<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{


    /**@test */
    public function test_user_login()
    {

        $user = User::factory()->create([
            'id' => 1,
            'email' => 'taylor@laravel.com',
        ]);

        $this->browse(function ($browser) {
            $browser->visit('/login')
                ->type('email', 'taylor@laravel.com')
                ->type('password', 'password')
                ->press('LOG IN')
                ->assertPathIs('/allDisplays');
        });
    }


    /**@test */
    public function test_user_logout()
    {

        $this->browse(function ($browser) {
            $browser->visit('/allDisplays')
                ->logout()
                ->visit('/')
                ->assertSee('Login')
                ->pause(2000);
        });
    }


//    /**@test */
//
//    public function test_node_creation()
//    {
//        $this->browse(function ($browser) {
//            $browser->visit('/userDisplays')
//                ->type('node_title', 'Test Node')
//                ->type('node_location', 'location')
//                ->type('node_description', 'description')
//                ->select('node_mode', 'Portrait')
//                ->press('CREATE')
//                ->assertPathIs('/userDisplays');
//        });
//    }

//
//    /**@test */
//    public function test_node_edit()
//    {
//        $this->browse(function ($browser) {
//            $browser->visit('/userDisplays')
//                ->press('Delete1')
//                ->assertPathIs('/userDisplays');
//        });
//    }

}
