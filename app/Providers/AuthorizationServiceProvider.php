<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthorizationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();
        $this->registerRoleGates();
    }
    /**
     * Register gates for role
     *
     * @return void
     */
    protected function registerRoleGates(): void
    {
        Gate::define('admin', fn (User $user) => $user->roles->contains('nome', 'Administrador'));
        Gate::define('medico', fn (User $user) => $user->roles->contains('nome', 'Médico'));
        Gate::define('recepcionista', fn (User $user) => $user->roles->contains('nome', 'Recepcionista'));
        Gate::define('paciente', fn (User $user) => $user->roles->contains('nome', 'Paciente'));
    }
}
