<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (!Auth::guard('web')->validate([
            'email'    => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

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
}
