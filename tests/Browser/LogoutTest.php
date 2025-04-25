<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * Test logout functionality.
     * @group logout
     */
    public function testLogout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login') // Buka login
                ->assertPathIs('/login') // Pastikan /login
                ->type('email', 'putri@example.com') // Isi email
                ->type('password', 'password123') // Isi password
                ->press('LOG IN') // Login
                ->assertPathIs('/dashboard') // Fashboard
                ->pause(500) // Tunggu UI siap
                ->press('Putri Nabilah') // Buka dropdown profil
                ->waitForLink('Log Out', 5) // Tunggu opsi keluar
                ->clickLink('Log Out') // Klik logout
                ->waitForLocation('/login') // Tunggu redirect
                ->assertPathIs('/login'); // Pastikan kembali di /login
        });
    }
}
