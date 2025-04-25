<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DetailNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group detail-note
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login') // Buka halaman login
                ->assertPathIs('/login') // Pastikan di /login

                ->type('email', 'putri@example.com') // Isi email
                ->type('password', 'password123') // Isi password

                ->press('LOG IN') // Klik login
                ->assertPathIs('/dashboard') // Pastikan dashboard

                ->pause(3000) // Tunggu beberapa detik

                ->clickLink('Notes') // Klik link "Notes"
                ->pause(3000) // Tunggu beberapa detik

                ->visit('/note/1') // Halaman detail catatan
                ->assertPathIs('/note/1'); // Halaman /note/1
        });
    }
}
