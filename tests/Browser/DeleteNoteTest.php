<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group delete-note
     */
    public function testDeleteNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login') // Buka halaman login
                ->assertPathIs('/login') // Pastikan di /login

                ->type('email', 'putri@example.com') // Isi email
                ->type('password', 'password123') // Isi password

                ->press('LOG IN') // Klik login
                ->assertPathIs('/dashboard') // Pastikan dashboard

                ->clickLink('Notes') // Klik link "Notes"
                ->visit('/notes') // Halaman notes

                ->waitFor('#delete-1') // Tunggu tombol hapus
                ->click('#delete-1') // Klik tombol delete

                ->visit('/notes') // Kembali ke halaman notes
                ->assertDontSee('Judul Catatan yang Dihapus'); // Pastikan catatan yang dihapus tidak ada
        });
    }
}
