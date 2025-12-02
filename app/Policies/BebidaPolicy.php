<?php

namespace App\Policies;

use App\Models\Bebida;
use App\Models\User;
use Illuminate\Auth\Access\Response;

use App\Http\Controllers\PermissionController;

class BebidaPolicy
{
    public function viewAny(User $user): bool
    {
        return PermissionController::isAuthorized('bebidas.index');
    }

    public function view(User $user, Bebida $bebida): bool
    {
        return PermissionController::isAuthorized('bebidas.show');
    }

    public function create(User $user): bool
    {
        return PermissionController::isAuthorized('bebidas.create');
    }

    public function update(User $user, Bebida $bebida): bool
    {
        return PermissionController::isAuthorized('bebidas.edit');
    }

    public function delete(User $user, Bebida $bebida): bool
    {
        return PermissionController::isAuthorized('bebidas.delete');
    }

    public function moverParaAdega(User $user, Bebida $bebida): bool
    {
        return PermissionController::isAuthorized('bebidas.moverParaAdega');
    }
}
