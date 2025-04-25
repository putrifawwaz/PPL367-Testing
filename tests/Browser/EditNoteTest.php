<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group edit-note
     */
    public function testEditNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login') // Buka login
                ->assertPathIs('/login') // Pastikan /login

                ->type('email', 'putri@example.com') // Isi email
                ->type('password', 'password123') // Isi password

                ->press('LOG IN') // Login
                ->assertPathIs('/dashboard') // Pastikan dashboard

                ->clickLink('Notes') // Klik "Notes" untuk daftar catatan
                ->visit('/notes') // Pastikan di halaman notes

                ->clickLink('Edit') // Klik "Edit" pada catatan pertama
                ->visit('/edit-note-page/1') // Pastikan di halaman edit catatan

                ->type('title', 'Judul Catatan yang Diedit') // Edit judul
                ->type('description', 'Deskripsi catatan yang diedit') // Edit deskripsi

                ->press('UPDATE') // Klik "UPDATE" untuk menyimpan perubahan

                ->waitForLocation('/notes') // Tunggu redirect ke /notes
                ->assertPathIs('/notes'); // Pastikan di halaman notes
        });
    }
}
