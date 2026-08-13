<?php

namespace App\Policies;

class DeliveryPolicy
{
    public function viewAny(\App\Models\User $user): bool
    {
        return $user->can('deliveries.view');
    }

    public function view(\App\Models\User $user, mixed $model = null): bool
    {
        return $user->can('deliveries.view');
    }

    public function create(\App\Models\User $user): bool
    {
        return $user->can('deliveries.create');
    }

    public function update(\App\Models\User $user, mixed $model = null): bool
    {
        return $user->can('deliveries.update');
    }

    public function manage(\App\Models\User $user, mixed $model = null): bool
    {
        return $user->can('deliveries.manage');
    }
}