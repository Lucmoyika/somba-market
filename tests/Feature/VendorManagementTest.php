<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Vendor;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VendorManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolePermissionSeeder::class);
    }

    public function test_admin_can_consult_vendor_list(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        $this->actingAs($admin)
            ->get('/vendors')
            ->assertOk();
    }

    public function test_admin_can_create_vendor(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $targetUser = User::factory()->create();

        $this->actingAs($admin)
            ->post('/vendors', [
                'user_id' => $targetUser->id,
                'name' => 'Acme Commerce',
                'slug' => 'acme-commerce',
                'email' => 'seller@acme.com',
                'phone' => '+243812345678',
                'description' => 'Seller account',
                'status' => Vendor::STATUS_ACTIVE,
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('vendors', [
            'user_id' => $targetUser->id,
            'slug' => 'acme-commerce',
            'status' => Vendor::STATUS_ACTIVE,
        ]);
    }

    public function test_admin_can_update_vendor(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $vendor = Vendor::factory()->create();

        $this->actingAs($admin)
            ->put('/vendors/' . $vendor->id, [
                'name' => 'Updated Vendor',
                'slug' => 'updated-vendor',
                'email' => 'updated@example.com',
                'phone' => '+243987654321',
                'status' => Vendor::STATUS_ACTIVE,
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('vendors', [
            'id' => $vendor->id,
            'name' => 'Updated Vendor',
            'slug' => 'updated-vendor',
        ]);
    }

    public function test_admin_can_activate_vendor(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $vendor = Vendor::factory()->create(['status' => Vendor::STATUS_PENDING]);

        $this->actingAs($admin)
            ->patch('/vendors/' . $vendor->id . '/activate')
            ->assertRedirect();

        $this->assertDatabaseHas('vendors', [
            'id' => $vendor->id,
            'status' => Vendor::STATUS_ACTIVE,
        ]);
    }

    public function test_admin_can_suspend_vendor(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $vendor = Vendor::factory()->create(['status' => Vendor::STATUS_ACTIVE]);

        $this->actingAs($admin)
            ->patch('/vendors/' . $vendor->id . '/suspend')
            ->assertRedirect();

        $this->assertDatabaseHas('vendors', [
            'id' => $vendor->id,
            'status' => Vendor::STATUS_SUSPENDED,
        ]);
    }

    public function test_vendor_can_view_own_profile(): void
    {
        $vendorUser = User::factory()->create();
        $vendorUser->assignRole('vendor');
        $vendor = Vendor::factory()->create(['user_id' => $vendorUser->id]);

        $this->actingAs($vendorUser)
            ->get('/vendors/' . $vendor->id)
            ->assertOk();
    }

    public function test_vendor_cannot_update_another_vendor_profile(): void
    {
        $vendorUser = User::factory()->create();
        $vendorUser->assignRole('vendor');
        $otherVendor = Vendor::factory()->create();

        $this->actingAs($vendorUser)
            ->put('/vendors/' . $otherVendor->id, [
                'name' => 'Forbidden Name',
                'slug' => 'forbidden-name',
            ])
            ->assertForbidden();
    }

    public function test_unauthorized_user_receives_forbidden(): void
    {
        $customer = User::factory()->create();
        $customer->assignRole('customer');

        $this->actingAs($customer)
            ->get('/vendors')
            ->assertForbidden();
    }

    public function test_validation_prevents_invalid_vendor_data(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $targetUser = User::factory()->create();

        $this->actingAs($admin)
            ->post('/vendors', [
                'user_id' => $targetUser->id,
                'name' => '',
                'slug' => '',
                'status' => 'invalid-status',
            ])
            ->assertSessionHasErrors(['name', 'slug', 'status']);
    }

    public function test_user_id_cannot_be_associated_to_multiple_vendors(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $targetUser = User::factory()->create();

        Vendor::factory()->create(['user_id' => $targetUser->id]);

        $this->actingAs($admin)
            ->post('/vendors', [
                'user_id' => $targetUser->id,
                'name' => 'Second Vendor',
                'slug' => 'second-vendor',
                'status' => Vendor::STATUS_PENDING,
            ])
            ->assertSessionHasErrors(['user_id']);
    }
}
