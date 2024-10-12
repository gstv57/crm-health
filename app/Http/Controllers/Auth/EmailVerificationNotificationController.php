<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\{RedirectResponse, Request};

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            $user = $request->user();

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

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
