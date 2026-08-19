<?php

namespace App\Providers;

use App\Models\Vendor;
use App\Policies\DeliveryPolicy;
use App\Policies\OrderPolicy;
use App\Policies\ProductPolicy;
use App\Policies\ReviewPolicy;
use App\Policies\StorePolicy;
use App\Policies\VendorPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Vendor::class => VendorPolicy::class,
        'App\\Models\\Store' => StorePolicy::class,
        'App\\Models\\Product' => ProductPolicy::class,
        'App\\Models\\Order' => OrderPolicy::class,
        'App\\Models\\Delivery' => DeliveryPolicy::class,
        'App\\Models\\Review' => ReviewPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
