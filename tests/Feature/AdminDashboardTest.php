<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    public function test_admin_dashboard_can_be_rendered(): void
    {
        $response = $this->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('Good Morning, Admin!');
        $response->assertSee('Tingkat Booking 7 Hari Terakhir');
    }

    public function test_admin_bookings_can_be_rendered(): void
    {
        $response = $this->get('/admin/booking');
        $response->assertStatus(200);
        $response->assertSee('Daftar Booking');
        $response->assertSee('BK-0012');
    }

    public function test_admin_booking_create_can_be_rendered(): void
    {
        $response = $this->get('/admin/booking/create');
        $response->assertStatus(200);
        $response->assertSee('Buat Booking Baru');
        $response->assertSee('Portrait Premium');
    }

    public function test_admin_packages_can_be_rendered(): void
    {
        $response = $this->get('/admin/packages');
        $response->assertStatus(200);
        $response->assertSee('Graduation');
        $response->assertSee('Rp 750.000');
    }

    public function test_admin_package_create_can_be_rendered(): void
    {
        $response = $this->get('/admin/packages/create');
        $response->assertStatus(200);
        $response->assertSee('Tambah Paket Baru');
    }

    public function test_admin_schedule_can_be_rendered(): void
    {
        $response = $this->get('/admin/schedule');
        $response->assertStatus(200);
        $response->assertSee('Jadwal Pemotretan');
        $response->assertSee('26 Apr 2026 – 02 Mei 2026');
    }

    public function test_admin_schedule_create_can_be_rendered(): void
    {
        $response = $this->get('/admin/schedule/create');
        $response->assertStatus(200);
        $response->assertSee('Tambah Jadwal Sesi');
        $response->assertSee('Studio A');
    }

    public function test_admin_customer_can_be_rendered(): void
    {
        $response = $this->get('/admin/customer');
        $response->assertStatus(200);
        $response->assertSee('Rina Amelia');
        $response->assertSee('Total Pelanggan');
    }

    public function test_admin_settings_can_be_rendered(): void
    {
        $response = $this->get('/admin/settings');
        $response->assertStatus(200);
        $response->assertSee('Informasi Studio');
        $response->assertSee('Akun');
        $response->assertSee('Pembayaran');
    }
}
