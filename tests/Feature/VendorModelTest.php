<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class VendorModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_vendor(): void
    {
        $user = User::factory()->create();

        $vendor = Vendor::create([
            'user_id' => $user->id,
            'name' => 'Somba Market Vendor',
            'slug' => Str::slug('Somba Market Vendor'),
            'description' => 'Boutique de démonstration',
            'phone' => '+243000000000',
            'email' => 'vendor@example.com',
            'status' => Vendor::STATUS_PENDING,
        ]);

        $this->assertDatabaseHas('vendors', [
            'id' => $vendor->id,
            'user_id' => $user->id,
            'name' => 'Somba Market Vendor',
            'slug' => 'somba-market-vendor',
            'status' => Vendor::STATUS_PENDING,
        ]);
    }

    public function test_vendor_factory_can_create_a_vendor(): void
    {
        $vendor = Vendor::factory()->create();

        $this->assertDatabaseHas('vendors', [
            'id' => $vendor->id,
            'user_id' => $vendor->user_id,
            'slug' => $vendor->slug,
        ]);
    }

    public function test_user_has_one_vendor_relation(): void
    {
        $user = User::factory()->create();

        $vendor = Vendor::create([
            'user_id' => $user->id,
            'name' => 'Vendor One',
            'slug' => 'vendor-one',
            'status' => Vendor::STATUS_ACTIVE,
        ]);

        $this->assertTrue($user->vendor->is($vendor));
    }

    public function test_vendor_status_helpers(): void
    {
        $vendor = Vendor::make([
            'user_id' => 1,
            'name' => 'Vendor Status',
            'slug' => 'vendor-status',
            'status' => Vendor::STATUS_ACTIVE,
        ]);

        $this->assertTrue($vendor->isActive());
        $this->assertFalse($vendor->isPending());
        $this->assertFalse($vendor->isSuspended());
    }

    public function test_vendor_belongs_to_user_relation(): void
    {
        $user = User::factory()->create();

        $vendor = Vendor::create([
            'user_id' => $user->id,
            'name' => 'Vendor Two',
            'slug' => 'vendor-two',
            'status' => Vendor::STATUS_ACTIVE,
        ]);

        $this->assertTrue($vendor->user->is($user));
    }

    public function test_user_id_must_be_unique(): void
    {
        $user = User::factory()->create();

        Vendor::create([
            'user_id' => $user->id,
            'name' => 'Vendor Three',
            'slug' => 'vendor-three',
            'status' => Vendor::STATUS_ACTIVE,
        ]);

        $this->expectException(QueryException::class);

        Vendor::create([
            'user_id' => $user->id,
            'name' => 'Vendor Four',
            'slug' => 'vendor-four',
            'status' => Vendor::STATUS_SUSPENDED,
        ]);
    }
}