<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = auth()->user();

        if ($user->roles->contains(User::PACIENTE)) {
            return redirect()->intended(route('minhas.consulta.index', absolute: false));
        }

        if ($user->roles->contains(User::RECEPCIONISTA)) {
            return redirect()->intended(route('paciente.index', absolute: false));
        }

        if ($user->roles->contains(User::MEDICO)) {
            return redirect()->intended(route('medicos.consulta.index', absolute: false));
        }

        if ($user->roles->contains(User::ADMIN)) {
            return redirect()->intended(route('dashboard.analise', absolute: false));
        }

        return redirect()->route('login')->with('error', 'Acesso não permitido.');
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
