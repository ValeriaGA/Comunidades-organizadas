<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testIsValidLogIn_InCorrectPassword_ReturnsErrorMessage()
    {
        $user = new User();

        $user -> email = "admin@localhost.com";
        $user -> password = "secret";

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->pause(1000)
                    ->type('@login-email-input', $user->email)
                    ->type('@login-password-input', 'test')
                    ->click('@login-button')
                    ->assertSee('These credentials do not match our records.');
        });
    }

    public function testIsValidLogIn_CorrectCredentials_ReturnsLoggedInView()
    {

        $user = new User();
        $user -> name = "admin";
        $user -> email = "admin@localhost.com";
        $user -> password = "secret";

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->pause(1000)
                    ->type('@login-email-input', $user->email)
                    ->type('@login-password-input', $user -> password)
                    ->click('@login-button')
                    ->assertAuthenticated();
        });

    }
}
