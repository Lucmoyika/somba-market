<?php

namespace App\Policies;

class ReviewPolicy
{
    public function viewAny(\App\Models\User $user): bool
    {
        return $user->can('reviews.view');
    }

    public function view(\App\Models\User $user, mixed $model = null): bool
    {
        return $user->can('reviews.view');
    }

    public function manage(\App\Models\User $user, mixed $model = null): bool
    {
        return $user->can('reviews.manage');
    }
}