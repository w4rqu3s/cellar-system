<?php

namespace App\Policies;

use App\Models\Tipo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

use App\Http\Controllers\PermissionController;

class TipoPolicy
{
    public function viewAny(User $user): bool
    {
        return PermissionController::isAuthorized('tipos.index');
    }

    public function view(User $user, Tipo $tipo): bool
    {
        return PermissionController::isAuthorized('tipos.show');
    }

    public function create(User $user): bool
    {
        return PermissionController::isAuthorized('tipos.create');
    }

    public function update(User $user, Tipo $tipo): bool
    {
        return PermissionController::isAuthorized('tipos.edit');
    }

    public function delete(User $user, Tipo $tipo): bool
    {
        return PermissionController::isAuthorized('tipos.delete');
    }
}
