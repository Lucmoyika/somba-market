<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboards.show', [
            'title' => 'Customer Dashboard',
            'role' => 'customer',
        ]);
    }
}