<?php

namespace Tests\Feature;

use App\Models\GalleryItem;
use Database\Seeders\GalleryItemSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

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

    public function test_admin_gallery_can_be_rendered(): void
    {
        $response = $this->get('/admin/gallery');
        $response->assertStatus(200);
        $response->assertSee('Gallery Showcase');
        $response->assertSee('Slot #01');
        $response->assertSee('Slot #17');
    }

    public function test_admin_gallery_slot_can_be_updated_with_file(): void
    {
        Storage::fake('public');

        $item = GalleryItem::create([
            'position' => 1,
            'title' => 'Initial Title',
            'category' => 'Graduation',
            'image_path' => 'img/hero/mjp_2866.webp',
        ]);

        $file = UploadedFile::fake()->create('test_new_photo.jpg', 100, 'image/jpeg');

        $response = $this->post(route('admin.gallery.update', $item->id), [
            'title' => 'Updated Graduation Hero',
            'category' => 'Graduation',
            'is_active' => '1',
            'image_file' => $file,
        ]);

        $response->assertRedirect(route('admin.gallery'));
        $response->assertSessionHas('success');

        $item->refresh();
        $this->assertSame('Updated Graduation Hero', $item->title);
        $this->assertStringStartsWith('storage/gallery/', $item->image_path);
    }

    public function test_admin_gallery_slot_can_be_reset(): void
    {
        $this->seed(GalleryItemSeeder::class);

        $item = GalleryItem::where('position', 1)->firstOrFail();
        $item->update([
            'title' => 'Customized Title',
            'image_path' => 'storage/gallery/random.jpg',
        ]);

        $response = $this->post(route('admin.gallery.reset', $item->id));
        $response->assertRedirect(route('admin.gallery'));

        $item->refresh();
        $this->assertSame('Graduation Portrait', $item->title);
        $this->assertSame('img/hero/mjp_2866.webp', $item->image_path);
    }

    public function test_home_page_renders_gallery_from_database(): void
    {
        GalleryItem::create([
            'position' => 1,
            'title' => 'Special Custom Hero',
            'category' => 'Graduation',
            'image_path' => 'img/hero/custom_sample.webp',
            'is_active' => true,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('img/hero/custom_sample.webp');
    }
}
