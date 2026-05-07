<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class PemesananOrderRouteTest extends TestCase
{
    public function test_guest_is_redirected_from_pesanan_routes(): void
    {
        $this->get(route('backend.pemesanan.buku'))
            ->assertRedirect(route('backend.login'));

        $this->get(route('backend.riwayat.pesanan'))
            ->assertRedirect(route('backend.login'));
    }

    public function test_pendaftar_can_open_buku_form(): void
    {
        $user = new User();
        $user->id = 99999;
        $user->name = 'Demo Pendaftar';
        $user->email = 'demo.pendaftar@example.com';
        $user->role = 'pendaftar';

        $this->actingAs($user)
            ->get(route('backend.pemesanan.buku'))
            ->assertOk()
            ->assertSee('Form Pemesanan Buku Jurusan TKA');
    }

    public function test_pesanan_routes_are_registered_with_student_middleware(): void
    {
        $bukuRoute = Route::getRoutes()->getByName('backend.pemesanan.buku');
        $riwayatRoute = Route::getRoutes()->getByName('backend.riwayat.pesanan');
        $bajuRoute = Route::getRoutes()->getByName('backend.pemesanan.baju');

        $this->assertNotNull($bukuRoute);
        $this->assertNotNull($riwayatRoute);
        $this->assertNotNull($bajuRoute);

        $this->assertStringContainsString('backend/form-pemesanan-buku', $bukuRoute->uri());
        $this->assertStringContainsString('backend/riwayat-pesanan', $riwayatRoute->uri());

        $this->assertStringContainsString('auth', implode(',', $bukuRoute->gatherMiddleware()));
        $this->assertStringContainsString('check.pendaftar', implode(',', $bukuRoute->gatherMiddleware()));
        $this->assertStringContainsString('check.pendaftar', implode(',', $bajuRoute->gatherMiddleware()));
        $this->assertStringContainsString('check.pendaftar', implode(',', $riwayatRoute->gatherMiddleware()));
    }
}