<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group note
     */
    public function testCreateNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login') // Buka login
                ->assertPathIs('/login') // Pastikan /login

                ->type('email', 'putri@example.com') // Isi email
                ->type('password', 'password123') // Isi password

                ->press('LOG IN') // Login
                ->assertPathIs('/dashboard') // Pastikan dashboard

                ->visit('/create-note') // Buka form
                ->assertPathIs('/create-note') // Pastikan create-note

                ->type('title', 'Judul Uji Coba') // Isi judul
                ->type('description', 'Isi deskripsi catatan') // Isi deskripsi

                ->press('CREATE') // Submit form

                ->waitForLocation('/notes') // Tunggu redirect
                ->assertPathIs('/notes'); // Pastikan /notes
        });
    }
}
