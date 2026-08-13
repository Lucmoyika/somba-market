<?php

namespace App\Policies;

class ProductPolicy
{
    public function viewAny(\App\Models\User $user): bool
    {
        return $user->can('products.view');
    }

    public function view(\App\Models\User $user, mixed $model = null): bool
    {
        return $user->can('products.view');
    }

    public function create(\App\Models\User $user): bool
    {
        return $user->can('products.create');
    }

    public function update(\App\Models\User $user, mixed $model = null): bool
    {
        return $user->can('products.update');
    }

    public function delete(\App\Models\User $user, mixed $model = null): bool
    {
        return $user->can('products.delete');
    }
}