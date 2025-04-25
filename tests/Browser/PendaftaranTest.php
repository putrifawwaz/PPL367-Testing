<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PendaftaranTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group pendaftaran
     */
    public function testRegister(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register') // Membuka halaman registrasi
                ->assertPathIs('/register') // Memastikan saat awal ada di /register
                ->type('name', 'Putri Nabilah') // Mengisi input "Name"
                ->type('email', 'putri' . now()->timestamp . '@example.com') // Mengisi input "Email"
                ->type('password', 'password123') // Mengisi password
                ->type('password_confirmation', 'password123') // Konfirmasi password
                ->press('REGISTER') // Klik  "Register"
                ->waitForLocation('/dashboard') // Redirect
                ->assertPathIs('/dashboard') // Halaman dashboard
                ->assertSee('Dashboard'); // Cek tulisan Dashboard
        });
    }
}
