<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboards.show', [
            'title' => 'Support Dashboard',
            'role' => 'support',
        ]);
    }
}