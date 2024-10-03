<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleUpdateRequest;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Role $role, RoleUpdateRequest $request)
    {
        try {
            // TODO - Transaction and Permission to make this
            $role->permissoes()->sync($request->permissoes);

            return to_route('role.index')->with('success', 'Role atualizado(a) com sucesso!');
        } catch (Exception $error) {
            Log::info($error->getMessage());

            return to_route('role.index')->with('error', 'Algo de errado aconteceu, entre em contato com o suporte.');
        }
    }
}
