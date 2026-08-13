<?php

namespace App\Policies\Concerns;

trait UsesPermissionChecks
{
    protected function allows(\App\Models\User $user, string $permission): bool
    {
        return $user->can($permission);
    }
}