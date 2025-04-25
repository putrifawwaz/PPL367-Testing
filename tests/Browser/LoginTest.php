<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group login
     */
    public function testLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login') // Buka halaman login
                ->assertPathIs('/login') // Pastikan di /login

                ->type('email', 'putri' . '@example.com') // Isi email (unik tiap testing)
                ->type('password', 'password123') // Isi password

                ->press('LOG IN') // Klik tombol login
                ->assertPathIs('/dashboard'); // Pastikan menuju dashboard
        });
    }
}
