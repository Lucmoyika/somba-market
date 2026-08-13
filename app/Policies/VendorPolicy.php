<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vendor;
use App\Policies\Concerns\UsesPermissionChecks;

class VendorPolicy
{
    use UsesPermissionChecks;

    public function viewAny(User $user): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        if ($user->hasRole('vendor')) {
            return $user->vendor()->exists();
        }

        return $this->allows($user, 'vendors.view');
    }

    public function view(User $user, ?Vendor $vendor = null): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return $user->hasRole('vendor') && $vendor !== null && $vendor->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return $user->hasRole('admin') || $this->allows($user, 'vendors.create');
    }

    public function update(User $user, ?Vendor $vendor = null): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return $user->hasRole('vendor') && $vendor !== null && $vendor->user_id === $user->id;
    }

    public function delete(User $user, ?Vendor $vendor = null): bool
    {
        return $user->hasRole('admin') || $this->allows($user, 'vendors.delete');
    }

    public function activate(User $user, ?Vendor $vendor = null): bool
    {
        return $user->hasRole('admin');
    }

    public function suspend(User $user, ?Vendor $vendor = null): bool
    {
        return $user->hasRole('admin');
    }
}
