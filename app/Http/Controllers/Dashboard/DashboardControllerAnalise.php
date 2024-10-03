<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardControllerAnalise extends Controller
{
    public function __invoke(Request $request)
    {
        return view('dashboard');
    }
}
