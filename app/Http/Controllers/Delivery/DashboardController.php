<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboards.show', [
            'title' => 'Delivery Dashboard',
            'role' => 'delivery',
        ]);
    }
}