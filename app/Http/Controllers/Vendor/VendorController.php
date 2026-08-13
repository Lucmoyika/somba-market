<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Services\VendorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class VendorController extends Controller
{
    public function __construct(protected VendorService $vendorService)
    {
    }

    public function index(Request $request): View
    {
        Gate::authorize('viewAny', Vendor::class);

        $user = $request->user();

        $vendors = Vendor::query()
            ->when($user && $user->hasRole('vendor') && ! $user->hasRole('admin'), function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->string('search')->trim();
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('slug', 'like', "%{$search}%");
                });
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->string('status')->toString());
            })
            ->latest()
            ->paginate(10);

        return view('vendors.index', compact('vendors'));
    }

    public function create(): View
    {
        Gate::authorize('create', Vendor::class);

        return view('vendors.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Gate::authorize('create', Vendor::class);

        $validated = $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:vendors,slug'],
            'description' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'status' => ['required', 'in:pending,active,suspended'],
        ]);

        $this->vendorService->create($validated);

        return redirect()->route('vendors.index')->with('success', 'Vendor created successfully.');
    }

    public function show(Vendor $vendor): View
    {
        Gate::authorize('view', $vendor);

        return view('vendors.show', compact('vendor'));
    }

    public function edit(Vendor $vendor): View
    {
        Gate::authorize('update', $vendor);

        return view('vendors.edit', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor): RedirectResponse
    {
        Gate::authorize('update', $vendor);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('vendors', 'slug')->ignore($vendor->id)],
            'description' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'status' => ['required', 'in:pending,active,suspended'],
        ]);

        $this->vendorService->update($vendor, $validated);

        return redirect()->route('vendors.index')->with('success', 'Vendor updated successfully.');
    }

    public function activate(Vendor $vendor): RedirectResponse
    {
        Gate::authorize('activate', $vendor);
        $this->vendorService->activate($vendor);

        return redirect()->route('vendors.index')->with('success', 'Vendor activated successfully.');
    }

    public function suspend(Vendor $vendor): RedirectResponse
    {
        Gate::authorize('suspend', $vendor);
        $this->vendorService->suspend($vendor);

        return redirect()->route('vendors.index')->with('success', 'Vendor suspended successfully.');
    }
}
