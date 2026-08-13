<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RolePermissionSeederTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolePermissionSeeder::class);
    }

    public function test_roles_exist(): void
    {
        $this->assertTrue(Role::where('name', 'admin')->where('guard_name', 'web')->exists());
        $this->assertTrue(Role::where('name', 'vendor')->where('guard_name', 'web')->exists());
        $this->assertTrue(Role::where('name', 'customer')->where('guard_name', 'web')->exists());
        $this->assertTrue(Role::where('name', 'delivery')->where('guard_name', 'web')->exists());
        $this->assertTrue(Role::where('name', 'support')->where('guard_name', 'web')->exists());
    }

    public function test_admin_has_all_permissions(): void
    {
        $adminRole = Role::findByName('admin', 'web');

        $this->assertSame(
            Permission::query()->where('guard_name', 'web')->pluck('name')->sort()->values()->all(),
            $adminRole->permissions()->pluck('name')->sort()->values()->all()
        );
    }

    public function test_user_can_receive_vendor_role(): void
    {
        $user = User::factory()->create();

        $user->assignRole('vendor');

        $this->assertTrue($user->hasRole('vendor'));
    }

    public function test_has_permission_to_works(): void
    {
        $user = User::factory()->create();

        $user->assignRole('vendor');

        $this->assertTrue($user->hasPermissionTo('products.create'));
        $this->assertFalse($user->hasPermissionTo('payments.manage'));
    }
}