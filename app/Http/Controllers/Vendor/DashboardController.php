<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboards.show', [
            'title' => 'Vendor Dashboard',
            'role' => 'vendor',
        ]);
    }
}