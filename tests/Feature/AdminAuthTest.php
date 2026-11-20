<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config([
            'services.recaptcha.site_key' => 'test-site-key-12345',
            'services.recaptcha.secret_key' => 'test-secret-key-12345',
        ]);
    }

    public function test_login_page_renders_with_recaptcha_widget_and_script(): void
    {
        $response = $this->get(route('login'));

        $response->assertOk();
        $response->assertSee('https://www.google.com/recaptcha/api.js');
        $response->assertSee('class="g-recaptcha"', false);
        $response->assertSee('test-site-key-12345');
        $response->assertSee('Portal Admin');
    }

    public function test_authenticated_admin_is_redirected_away_from_login_page(): void
    {
        $admin = User::factory()->create();

        $response = $this->actingAs($admin)->get(route('login'));

        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_guest_is_redirected_to_login_page_when_accessing_admin_dashboard(): void
    {
        $response = $this->get('/admin');

        $response->assertRedirect(route('login'));
    }

    public function test_login_fails_when_recaptcha_is_missing(): void
    {
        $admin = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post(route('login.submit'), [
            'email' => $admin->email,
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors('g-recaptcha-response');
        $this->assertGuest();
    }

    public function test_login_fails_when_recaptcha_verification_is_rejected_by_google(): void
    {
        Http::fake([
            'https://www.google.com/recaptcha/api/siteverify' => Http::response([
                'success' => false,
                'error-codes' => ['invalid-input-response'],
            ], 200),
        ]);

        $admin = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post(route('login.submit'), [
            'email' => $admin->email,
            'password' => 'password123',
            'g-recaptcha-response' => 'fake-invalid-token',
        ]);

        $response->assertSessionHasErrors('g-recaptcha-response');
        $this->assertGuest();
    }

    public function test_login_succeeds_with_valid_credentials_and_recaptcha(): void
    {
        Http::fake([
            'https://www.google.com/recaptcha/api/siteverify' => Http::response([
                'success' => true,
            ], 200),
        ]);

        $admin = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post(route('login.submit'), [
            'email' => $admin->email,
            'password' => 'password123',
            'g-recaptcha-response' => 'valid-token',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($admin);
    }

    public function test_login_fails_with_wrong_password_despite_valid_recaptcha(): void
    {
        Http::fake([
            'https://www.google.com/recaptcha/api/siteverify' => Http::response([
                'success' => true,
            ], 200),
        ]);

        $admin = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post(route('login.submit'), [
            'email' => $admin->email,
            'password' => 'wrongpassword',
            'g-recaptcha-response' => 'valid-token',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_logout_invalidates_session_and_redirects_to_login(): void
    {
        $admin = User::factory()->create();

        $response = $this->actingAs($admin)->post(route('admin.logout'));

        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }
}
