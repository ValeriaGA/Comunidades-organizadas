<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class registerTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    /**
     * @group registerTests
     */
    public function testCreateUser_ValidUser_ReturnsHomeView()
    {
        $this->browse(function ($browser){
            $browser->visit('/register')
                    ->type('@register-name-input', 'Alice')
                    ->type('@register-email-input', 'alice@example.com')
                    ->type('@register-lastname1-input', 'Perez')
                    ->type('@register-lastname2-input', 'Perez')
                    ->type('@register-ID-input', '5555555')
                    ->type('@register-password-input', '1234567')
                    ->type('@register-passwordConfirm-input', '1234567')
                    ->click('@register-button');
        });

        $this->assertDatabaseHas('users', [
            'email' => 'alice@example.com',
        ]);
    }
}
