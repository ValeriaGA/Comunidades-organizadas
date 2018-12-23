<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GunManagementTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreateGunKind_validGunName_VerifyInDatabase()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/administracion/seguridad/armas/agregar')
                ->type('@addGun-name-input', 'Militar');
        });
    }
}
