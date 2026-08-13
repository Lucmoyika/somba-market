<?php

namespace App\Services;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class VendorService
{
    public function create(array $data): Vendor
    {
        return DB::transaction(function () use ($data): Vendor {
            $this->ensureUniqueUserId($data['user_id'] ?? null);

            $attributes = $this->prepareAttributes($data);

            return Vendor::create($attributes);
        });
    }

    public function update(Vendor $vendor, array $data): Vendor
    {
        return DB::transaction(function () use ($vendor, $data): Vendor {
            $attributes = $this->prepareAttributes($data, $vendor);
            $vendor->fill($attributes);
            $vendor->save();

            return $vendor;
        });
    }

    public function activate(Vendor $vendor): Vendor
    {
        return DB::transaction(function () use ($vendor): Vendor {
            $vendor->status = Vendor::STATUS_ACTIVE;
            $vendor->save();

            return $vendor;
        });
    }

    public function suspend(Vendor $vendor): Vendor
    {
        return DB::transaction(function () use ($vendor): Vendor {
            $vendor->status = Vendor::STATUS_SUSPENDED;
            $vendor->save();

            return $vendor;
        });
    }

    private function prepareAttributes(array $data, ?Vendor $vendor = null): array
    {
        $attributes = [];

        if (array_key_exists('user_id', $data)) {
            $attributes['user_id'] = (int) $data['user_id'];
        }

        if (array_key_exists('name', $data)) {
            $attributes['name'] = trim((string) $data['name']);
        }

        $slugSource = $data['slug'] ?? $data['name'] ?? null;
        $slug = blank($slugSource) ? ($vendor?->slug ?? null) : Str::slug((string) $slugSource);
        $attributes['slug'] = $slug;

        if (array_key_exists('description', $data)) {
            $attributes['description'] = blank($data['description']) ? null : trim((string) $data['description']);
        }

        if (array_key_exists('phone', $data)) {
            $attributes['phone'] = blank($data['phone']) ? null : trim((string) $data['phone']);
        }

        if (array_key_exists('email', $data)) {
            $attributes['email'] = blank($data['email']) ? null : trim((string) $data['email']);
        }

        if (array_key_exists('status', $data)) {
            $attributes['status'] = $data['status'];
        }

        if ($vendor instanceof Vendor && ! array_key_exists('user_id', $data)) {
            $attributes['user_id'] = $vendor->user_id;
        }

        if (! isset($attributes['status'])) {
            $attributes['status'] = Vendor::STATUS_PENDING;
        }

        return $attributes;
    }

    private function ensureUniqueUserId(?int $userId): void
    {
        if ($userId === null) {
            throw ValidationException::withMessages(['user_id' => 'The user_id field is required.']);
        }

        if (! User::query()->whereKey($userId)->exists()) {
            throw ValidationException::withMessages(['user_id' => 'The selected user is invalid.']);
        }

        $exists = Vendor::query()->where('user_id', $userId)->exists();
        if ($exists) {
            throw ValidationException::withMessages(['user_id' => 'This user is already associated with a vendor.']);
        }
    }
}
