<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterUserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_Visit_Registration_Page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Register Account');
        });
    }

    public function test_user_login()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
                ->type('name', 'tester')
                ->type('email', 'test@laravel.com')
                ->type('password', 'password')
                ->type('password_confirmation', 'password')
                ->press('Register')
                ->assertPathIs('/allDisplays')
                ->logout();
        });
    }

    public function test_user_already_registered()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
                ->type('name', 'tester')
                ->type('email', 'test@laravel.com')
                ->type('password', 'password')
                ->type('password_confirmation', 'password')
                ->press('Register')
                ->assertSee('Whoops! Something went wrong')
                ->pause(4000)
                ->assertPathIs('/register')
                ->logout();
        });
    }

}
