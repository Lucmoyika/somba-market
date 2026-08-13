<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2">
            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-indigo-600">{{ __('Vendor') }}</p>
            <h2 class="text-2xl font-semibold text-slate-900 dark:text-slate-100">{{ __('Edit Vendor') }}</h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="sombra-card p-6">
                <form method="POST" action="{{ route('vendors.update', $vendor) }}" class="grid gap-4 md:grid-cols-2">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-200">{{ __('Name') }}</label>
                        <input type="text" name="name" value="{{ old('name', $vendor->name) }}" class="mt-1 block w-full sombra-input" />
                        @error('name')<p class="mt-1 text-sm text-rose-600 dark:text-rose-300">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-200">{{ __('Slug') }}</label>
                        <input type="text" name="slug" value="{{ old('slug', $vendor->slug) }}" class="mt-1 block w-full sombra-input" />
                        @error('slug')<p class="mt-1 text-sm text-rose-600 dark:text-rose-300">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-200">{{ __('Email') }}</label>
                        <input type="email" name="email" value="{{ old('email', $vendor->email) }}" class="mt-1 block w-full sombra-input" />
                        @error('email')<p class="mt-1 text-sm text-rose-600 dark:text-rose-300">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-200">{{ __('Phone') }}</label>
                        <input type="text" name="phone" value="{{ old('phone', $vendor->phone) }}" class="mt-1 block w-full sombra-input" />
                        @error('phone')<p class="mt-1 text-sm text-rose-600 dark:text-rose-300">{{ $message }}</p>@enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-200">{{ __('Description') }}</label>
                        <textarea name="description" rows="3" class="mt-1 block w-full sombra-input">{{ old('description', $vendor->description) }}</textarea>
                        @error('description')<p class="mt-1 text-sm text-rose-600 dark:text-rose-300">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-200">{{ __('Status') }}</label>
                        <select name="status" class="mt-1 block w-full sombra-input">
                            <option value="pending" {{ old('status', $vendor->status) === 'pending' ? 'selected' : '' }}>{{ __('Pending') }}</option>
                            <option value="active" {{ old('status', $vendor->status) === 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                            <option value="suspended" {{ old('status', $vendor->status) === 'suspended' ? 'selected' : '' }}>{{ __('Suspended') }}</option>
                        </select>
                        @error('status')<p class="mt-1 text-sm text-rose-600 dark:text-rose-300">{{ $message }}</p>@enderror
                    </div>
                    <div class="md:col-span-2 flex justify-end">
                        <button type="submit" class="sombra-btn-primary">{{ __('Update Vendor') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
