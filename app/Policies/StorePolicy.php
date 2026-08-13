<?php

namespace App\Policies;

class StorePolicy
{
    public function viewAny(\App\Models\User $user): bool
    {
        return $user->can('stores.view');
    }

    public function view(\App\Models\User $user, mixed $model = null): bool
    {
        return $user->can('stores.view');
    }

    public function create(\App\Models\User $user): bool
    {
        return $user->can('stores.create');
    }

    public function update(\App\Models\User $user, mixed $model = null): bool
    {
        return $user->can('stores.update');
    }

    public function delete(\App\Models\User $user, mixed $model = null): bool
    {
        return $user->can('stores.delete');
    }
}