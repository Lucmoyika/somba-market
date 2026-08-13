<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'users.view',
            'users.create',
            'users.update',
            'users.delete',
            'vendors.view',
            'vendors.create',
            'vendors.update',
            'vendors.delete',
            'stores.view',
            'stores.create',
            'stores.update',
            'stores.delete',
            'products.view',
            'products.create',
            'products.update',
            'products.delete',
            'orders.view',
            'orders.create',
            'orders.update',
            'orders.cancel',
            'orders.manage',
            'deliveries.view',
            'deliveries.create',
            'deliveries.update',
            'deliveries.manage',
            'payments.view',
            'payments.manage',
            'reviews.view',
            'reviews.manage',
        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission, 'web');
        }

        $allPermissions = Permission::query()
            ->where('guard_name', 'web')
            ->get();

        $roles = [
            'admin' => $allPermissions->pluck('name')->all(),
            'vendor' => [
                'stores.view',
                'stores.create',
                'stores.update',
                'stores.delete',
                'products.view',
                'products.create',
                'products.update',
                'products.delete',
                'orders.view',
                'orders.update',
                'orders.cancel',
                'orders.manage',
            ],
            'customer' => [
                'products.view',
                'orders.view',
                'orders.create',
                'reviews.view',
                'reviews.manage',
            ],
            'delivery' => [
                'deliveries.view',
                'deliveries.create',
                'deliveries.update',
                'deliveries.manage',
            ],
            'support' => [
                'users.view',
                'vendors.view',
                'orders.view',
                'reviews.view',
                'reviews.manage',
            ],
        ];

        foreach ($roles as $roleName => $permissionNames) {
            $role = Role::findOrCreate($roleName, 'web');
            $role->syncPermissions($permissionNames);
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}