<?php

use App\Http\Controllers\Dashboard\DashboardControllerAnalise;
use App\Http\Controllers\Medico\{MedicoCreateController,
    MedicoEditController,
    MedicoIndexController,
    MedicoStoreController,
    MedicoUpdateController};
use App\Http\Controllers\Paciente\Consulta\ConsultaIndexController;
use App\Http\Controllers\Paciente\{Consulta\ConsultaCreateController,
    Consulta\ConsultaStoreController,
    PacienteCreateController,
    PacienteEditController,
    PacienteIndexController,
    PacienteStoreController,
    PacienteUpdateController,
    Prontuario\ProntuarioCreateController,
    Prontuario\ProntuarioIndexController,
    Prontuario\ProntuarioStoreController};
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Role\{RoleEditController, RoleIndexController, RoleUpdateController};
use App\Http\Controllers\Usuario\{UsuarioCreateController,
    UsuarioEditController,
    UsuarioIndexController,
    UsuarioStoreController,
    UsuarioUpdateController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/analise', DashboardControllerAnalise::class)->name('dashboard.analise');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('usuarios')->group(function () {
        Route::get('/', UsuarioIndexController::class)->name('usuario.index');
        Route::get('/criar', UsuarioCreateController::class)->name('usuario.create');
        Route::post('/criar', UsuarioStoreController::class)->name('usuario.store');
        Route::get('/editar/{usuario}', UsuarioEditController::class)->name('usuario.edit');
        Route::patch('/editar/{usuario}', UsuarioUpdateController::class)->name('usuario.update');
    });

    Route::prefix('roles')->group(function () {
        Route::get('/', RoleIndexController::class)->name('role.index');
        Route::get('/editar/{role}', RoleEditController::class)->name('role.edit');
        Route::patch('/editar/{role}', RoleUpdateController::class)->name('role.update');
    });

    Route::prefix('pacientes')->group(function () {
        Route::get('/', PacienteIndexController::class)->name('paciente.index');
        Route::get('/criar', PacienteCreateController::class)->name('paciente.create');
        Route::post('/criar', PacienteStoreController::class)->name('paciente.store');
        Route::get('/editar/{paciente}', PacienteEditController::class)->name('paciente.edit');
        Route::patch('/editar/{paciente}', PacienteUpdateController::class)->name('paciente.update');

        Route::prefix('{paciente}/prontuarios')->group(function () {
            Route::get('/', ProntuarioIndexController::class)->name('prontuario.index');
            Route::get('/criar', ProntuarioCreateController::class)->name('prontuario.create');
            Route::post('/criar', ProntuarioStoreController::class)->name('prontuario.store');
        });

        Route::prefix('{paciente}/consultas')->group(function () {
            Route::get('/', ConsultaIndexController::class)->name('consultas.index');
            Route::get('/criar', ConsultaCreateController::class)->name('consultas.create');
            Route::post('/criar', ConsultaStoreController::class)->name('consultas.store');
        });
    });

    Route::prefix('medicos')->group(function () {
        Route::get('/', MedicoIndexController::class)->name('medico.index');
        Route::get('/criar', MedicoCreateController::class)->name('medico.create');
        Route::post('/criar', MedicoStoreController::class)->name('medico.store');
        Route::get('/editar/{medico}', MedicoEditController::class)->name('medico.edit');
        Route::patch('/editar/{medico}', MedicoUpdateController::class)->name('medico.update');
    });
});

require __DIR__ . '/auth.php';
