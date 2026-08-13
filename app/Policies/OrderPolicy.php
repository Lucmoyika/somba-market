<?php

namespace App\Policies;

class OrderPolicy
{
    public function viewAny(\App\Models\User $user): bool
    {
        return $user->can('orders.view');
    }

    public function view(\App\Models\User $user, mixed $model = null): bool
    {
        return $user->can('orders.view');
    }

    public function create(\App\Models\User $user): bool
    {
        return $user->can('orders.create');
    }

    public function update(\App\Models\User $user, mixed $model = null): bool
    {
        return $user->can('orders.update');
    }

    public function cancel(\App\Models\User $user, mixed $model = null): bool
    {
        return $user->can('orders.cancel');
    }

    public function manage(\App\Models\User $user, mixed $model = null): bool
    {
        return $user->can('orders.manage');
    }
}