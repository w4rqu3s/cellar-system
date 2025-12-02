<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

use App\Http\Controllers\PermissionController;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return PermissionController::isAuthorized('usuarios.index');
    }

    public function view(User $user, User $model): bool
    {
        return PermissionController::isAuthorized('usuarios.show');
    }

    public function ban(User $user, User $model): bool {
        return PermissionController::isAuthorized('usuarios.ban');
    }   
}
