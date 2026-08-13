<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolePermissionSeeder::class);
    }

    public function test_admin_can_access_admin_dashboard(): void
    {
        $user = User::factory()->create()->assignRole('admin');

        $this->actingAs($user)
            ->get('/admin/dashboard')
            ->assertOk();
    }

    public function test_vendor_cannot_access_admin_dashboard(): void
    {
        $user = User::factory()->create()->assignRole('vendor');

        $this->actingAs($user)
            ->get('/admin/dashboard')
            ->assertForbidden();
    }

    public function test_vendor_can_access_vendor_dashboard(): void
    {
        $user = User::factory()->create()->assignRole('vendor');

        $this->actingAs($user)
            ->get('/vendor/dashboard')
            ->assertOk();
    }

    public function test_customer_cannot_access_vendor_dashboard(): void
    {
        $user = User::factory()->create()->assignRole('customer');

        $this->actingAs($user)
            ->get('/vendor/dashboard')
            ->assertForbidden();
    }

    public function test_delivery_can_access_delivery_dashboard(): void
    {
        $user = User::factory()->create()->assignRole('delivery');

        $this->actingAs($user)
            ->get('/delivery/dashboard')
            ->assertOk();
    }

    public function test_support_can_access_support_dashboard(): void
    {
        $user = User::factory()->create()->assignRole('support');

        $this->actingAs($user)
            ->get('/support/dashboard')
            ->assertOk();
    }

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get('/admin/dashboard')
            ->assertRedirect(route('login'));
    }

    public function test_permission_middleware_allows_authorized_user(): void
    {
        $user = User::factory()->create()->assignRole('vendor');

        $this->actingAs($user)
            ->get('/permissions/orders-manage')
            ->assertOk();
    }

    public function test_permission_middleware_blocks_unauthorized_user(): void
    {
        $user = User::factory()->create()->assignRole('customer');

        $this->actingAs($user)
            ->get('/permissions/orders-manage')
            ->assertForbidden();
    }
}