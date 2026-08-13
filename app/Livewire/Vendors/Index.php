<?php

namespace App\Livewire\Vendors;

use App\Models\Vendor;
use App\Services\VendorService;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\Attributes\Rule;

class Index extends Component
{
    public string $search = '';

    public string $status = '';

    #[Rule('required|string|max:255')]
    public string $name = '';

    #[Rule('required|string|max:255|unique:vendors,slug')]
    public string $slug = '';

    #[Rule('nullable|string')]
    public string $description = '';

    #[Rule('nullable|string|max:20')]
    public string $phone = '';

    #[Rule('nullable|email|max:255')]
    public string $email = '';

    #[Rule('required|integer|exists:users,id')]
    public int|string $user_id = '';

    #[Rule('required|in:pending,active,suspended')]
    public string $formStatus = 'pending';

    public ?int $editingId = null;

    public function mount(): void
    {
        $this->resetForm();
    }

    public function render()
    {
        $vendors = Vendor::query()
            ->when($this->search !== '', function ($query) {
                $search = trim($this->search);
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('slug', 'like', "%{$search}%");
                });
            })
            ->when($this->status !== '', function ($query) {
                $query->where('status', $this->status);
            })
            ->latest()
            ->paginate(10);

        return view('livewire.vendors.index', compact('vendors'));
    }

    public function submit(VendorService $vendorService): void
    {
        Gate::authorize('create', Vendor::class);

        $data = $this->validate();

        if ($this->editingId) {
            $vendor = Vendor::findOrFail($this->editingId);
            Gate::authorize('update', $vendor);
            $vendorService->update($vendor, $data);
            session()->flash('success', 'Vendor updated successfully.');
        } else {
            $vendorService->create($data);
            session()->flash('success', 'Vendor created successfully.');
        }

        $this->resetForm();
        $this->dispatch('$refresh');
    }

    public function edit(Vendor $vendor): void
    {
        Gate::authorize('update', $vendor);

        $this->editingId = $vendor->id;
        $this->name = $vendor->name;
        $this->slug = $vendor->slug;
        $this->description = $vendor->description ?? '';
        $this->phone = $vendor->phone ?? '';
        $this->email = $vendor->email ?? '';
        $this->user_id = (string) $vendor->user_id;
        $this->formStatus = $vendor->status;
    }

    public function activate(Vendor $vendor, VendorService $vendorService): void
    {
        Gate::authorize('activate', $vendor);
        $vendorService->activate($vendor);
        session()->flash('success', 'Vendor activated successfully.');
        $this->dispatch('$refresh');
    }

    public function suspend(Vendor $vendor, VendorService $vendorService): void
    {
        Gate::authorize('suspend', $vendor);
        $vendorService->suspend($vendor);
        session()->flash('success', 'Vendor suspended successfully.');
        $this->dispatch('$refresh');
    }

    private function resetForm(): void
    {
        $this->editingId = null;
        $this->name = '';
        $this->slug = '';
        $this->description = '';
        $this->phone = '';
        $this->email = '';
        $this->user_id = '';
        $this->formStatus = 'pending';
    }
}
