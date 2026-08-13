<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 space-y-6">
    <div class="sombra-card p-6">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.24em] text-indigo-600">{{ __('Vendors') }}</p>
                <h1 class="mt-2 text-2xl font-semibold text-slate-900 dark:text-slate-100">{{ __('Manage Somba Market vendors') }}</h1>
                <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">{{ __('Create, edit, and track vendors with a clear responsive experience.') }}</p>
            </div>
            <div class="flex flex-wrap gap-3">
                @if(Route::has('vendors.create'))
                    <a href="{{ route('vendors.create') }}" class="sombra-btn-primary">{{ __('Add Vendor') }}</a>
                @endif
                <span class="inline-flex items-center rounded-2xl bg-slate-100 px-4 py-2 text-sm text-slate-600 dark:bg-slate-800 dark:text-slate-300">{{ $vendors->total() }} {{ trans_choice('vendor', $vendors->total()) }}</span>
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="rounded-3xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-700 dark:border-emerald-900/40 dark:bg-emerald-950/40 dark:text-emerald-300">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="rounded-3xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700 dark:border-rose-900/40 dark:bg-rose-950/40 dark:text-rose-300">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="sombra-card p-6">
        <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100">{{ __('Create or update a vendor') }}</h2>
                <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">{{ __('Fill out the form below and save your changes.') }}</p>
            </div>
                <div class="inline-flex rounded-2xl sombra-surface-soft px-4 py-2 text-sm text-slate-600 dark:bg-slate-900 dark:text-slate-300">{{ __('Embedded form') }}</div>
        </div>

        <form wire:submit="submit" class="grid gap-4 lg:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300">{{ __('User ID') }}</label>
                <input type="number" wire:model="user_id" class="mt-1 block w-full sombra-input" />
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300">{{ __('Name') }}</label>
                <input type="text" wire:model="name" class="mt-1 block w-full sombra-input" />
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300">{{ __('Slug') }}</label>
                <input type="text" wire:model="slug" class="mt-1 block w-full sombra-input" />
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300">{{ __('Status') }}</label>
                <select wire:model="formStatus" class="mt-1 block w-full sombra-input">
                    <option value="pending">{{ __('Pending') }}</option>
                    <option value="active">{{ __('Active') }}</option>
                    <option value="suspended">{{ __('Suspended') }}</option>
                </select>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300">{{ __('Email') }}</label>
                <input type="email" wire:model="email" class="mt-1 block w-full sombra-input" />
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300">{{ __('Phone') }}</label>
                <input type="text" wire:model="phone" class="mt-1 block w-full sombra-input" />
            </div>
            <div class="lg:col-span-2">
                <label class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300">{{ __('Description') }}</label>
                <textarea wire:model="description" rows="4" class="mt-1 block w-full sombra-input"></textarea>
            </div>
            <div class="lg:col-span-2 flex justify-end">
                <button type="submit" class="sombra-btn-primary">
                    {{ $editingId ? __('Update Vendor') : __('Save Vendor') }}
                </button>
            </div>
        </form>
    </div>

    <div class="sombra-card p-6">
        <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-lg font-semibold text-slate-900 dark:text-slate-100">{{ __('Vendor list') }}</h2>
                <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">{{ __('Search and filter vendors with a responsive table.') }}</p>
            </div>
            <div class="grid gap-3 sm:grid-flow-col sm:auto-cols-max">
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300">{{ __('Search') }}</label>
                    <input type="text" wire:model.live.debounce.250ms="search" placeholder="{{ __('Name, email, phone or slug') }}" class="mt-1 block w-full sombra-input" />
                </div>
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300">{{ __('Status') }}</label>
                    <select wire:model.live="status" class="mt-1 block w-full sombra-input">
                        <option value="">{{ __('All') }}</option>
                        <option value="pending">{{ __('Pending') }}</option>
                        <option value="active">{{ __('Active') }}</option>
                        <option value="suspended">{{ __('Suspended') }}</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                <thead class="sombra-surface-soft text-slate-600 dark:bg-slate-900 dark:text-slate-300">
                    <tr>
                        <th class="px-4 py-4 font-semibold">{{ __('Name') }}</th>
                        <th class="px-4 py-4 font-semibold">{{ __('Email') }}</th>
                        <th class="px-4 py-4 font-semibold">{{ __('Phone') }}</th>
                        <th class="px-4 py-4 font-semibold">{{ __('Status') }}</th>
                        <th class="px-4 py-4 font-semibold">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 sombra-surface dark:bg-slate-950 dark:divide-slate-800">
                    @forelse ($vendors as $vendor)
                        <tr>
                            <td class="px-4 py-4 text-slate-900 dark:text-slate-100">{{ $vendor->name }}</td>
                            <td class="px-4 py-4 text-slate-600 dark:text-slate-300">{{ $vendor->email }}</td>
                            <td class="px-4 py-4 text-slate-600 dark:text-slate-300">{{ $vendor->phone }}</td>
                            <td class="px-4 py-4">
                                <span class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase text-slate-700 dark:bg-slate-900 dark:text-slate-300">{{ $vendor->status }}</span>
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex flex-wrap gap-2">
                                    <button type="button" wire:click="edit({{ $vendor->id }})" class="text-indigo-600 hover:text-indigo-700">{{ __('Edit') }}</button>
                                    @if ($vendor->status !== 'active')
                                        <button type="button" wire:click="activate({{ $vendor->id }})" class="text-emerald-600 hover:text-emerald-700">{{ __('Activate') }}</button>
                                    @endif
                                    @if ($vendor->status !== 'suspended')
                                        <button type="button" wire:click="suspend({{ $vendor->id }})" class="text-amber-600 hover:text-amber-700">{{ __('Suspend') }}</button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-sm text-slate-500 dark:text-slate-400">{{ __('No vendors found for these criteria.') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $vendors->links() }}</div>
    </div>
</div>