<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;
use App\Http\Controllers\Delivery\DashboardController as DeliveryDashboardController;
use App\Http\Controllers\Support\DashboardController as SupportDashboardController;
use App\Http\Controllers\Vendor\DashboardController as VendorDashboardController;
use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/locale/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'fr'], true)) {
        abort(404);
    }

    session(['locale' => $locale]);

    return redirect()->back();
})->name('locale.switch');

// Temporary route to create a local admin user (only in local environment)
Route::get('/_create-admin', function () {
    if (! app()->environment('local')) {
        abort(403);
    }

    $roleClass = '\\Spatie\\Permission\\Models\\Role';
    $roleClass::firstOrCreate(['name' => 'admin']);

    $userClass = App\Models\User::class;
    $user = $userClass::firstOrCreate(
        ['email' => 'admin@example.com'],
        ['name' => 'Admin', 'password' => bcrypt('secret')]
    );

    if (! $user->hasRole('admin')) {
        $user->assignRole('admin');
    }

    return response()->json(['email' => 'admin@example.com', 'password' => 'secret']);
});

// Local helper to render dashboard as admin (no auth cookies required)
Route::get('/_view-dashboard-admin', function () {
    if (! app()->environment('local')) {
        abort(403);
    }

    $user = App\Models\User::where('email', 'admin@example.com')->first();
    if (! $user) {
        abort(404, 'Admin user not found');
    }

    \Illuminate\Support\Facades\Auth::login($user);

    return view('dashboards.show');
});

// Local helper to list seeded users and their roles
Route::get('/_seeded-users', function () {
    if (! app()->environment('local')) {
        abort(403);
    }

    $users = App\Models\User::with('roles')->get()->map(function ($u) {
        return [
            'id' => $u->id,
            'name' => $u->name,
            'email' => $u->email,
            'roles' => $u->roles->pluck('name'),
        ];
    });

    return response()->json($users);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function (Request $request) {
        $user = $request->user();

        return match (true) {
            $user?->hasRole('admin') => redirect()->route('admin.dashboard'),
            $user?->hasRole('vendor') => redirect()->route('vendor.dashboard'),
            $user?->hasRole('customer') => redirect()->route('customer.dashboard'),
            $user?->hasRole('delivery') => redirect()->route('delivery.dashboard'),
            $user?->hasRole('support') => redirect()->route('support.dashboard'),
            default => view('dashboard'),
        };
    })->name('dashboard');

    Route::prefix('admin')
        ->name('admin.')
        ->middleware('role:admin')
        ->group(function () {
            Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');
        });

    Route::prefix('vendor')
        ->name('vendor.')
        ->middleware('role:vendor')
        ->group(function () {
            Route::get('/dashboard', VendorDashboardController::class)->name('dashboard');
        });

    Route::resource('vendors', VendorController::class)
        ->middleware(['auth', 'can:viewAny,App\\Models\\Vendor']);

    Route::patch('/vendors/{vendor}/activate', [VendorController::class, 'activate'])
        ->name('vendors.activate');

    Route::patch('/vendors/{vendor}/suspend', [VendorController::class, 'suspend'])
        ->name('vendors.suspend');

    Route::prefix('customer')
        ->name('customer.')
        ->middleware('role:customer')
        ->group(function () {
            Route::get('/dashboard', CustomerDashboardController::class)->name('dashboard');
        });

    Route::prefix('delivery')
        ->name('delivery.')
        ->middleware('role:delivery')
        ->group(function () {
            Route::get('/dashboard', DeliveryDashboardController::class)->name('dashboard');
        });

    Route::prefix('support')
        ->name('support.')
        ->middleware('role:support')
        ->group(function () {
            Route::get('/dashboard', SupportDashboardController::class)->name('dashboard');
        });

    Route::get('/permissions/orders-manage', function () {
        return response()->json([
            'message' => 'orders.manage granted',
        ]);
    })
        ->middleware('permission:orders.manage')
        ->name('permissions.orders-manage');
});
