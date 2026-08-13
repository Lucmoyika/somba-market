<?php

namespace App\Http\Middleware;

use App\Models\Vendor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EnsureVendorAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            abort(403);
        }

        if ($user->hasRole('admin')) {
            return $next($request);
        }

        if ($request->route('vendor') instanceof Vendor) {
            Gate::authorize('view', $request->route('vendor'));
        }

        return $next($request);
    }
}
