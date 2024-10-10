<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class DashboardControllerAnalise extends Controller
{
    public function __invoke(Request $request)
    {
        return view('dashboard');
    }
}
