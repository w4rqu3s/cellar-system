<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\PermissionController;

use App\models\User;
use App\models\Tipo;
use App\models\Bebida;

use App\Policies\UserPolicy;
use App\Policies\TipoPolicy;
use App\Policies\BebidaPolicy;


class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Tipo::class, TipoPolicy::class);
        Gate::policy(Bebida::class, BebidaPolicy::class);


        Gate::define('dashboard-view', function () {
            return PermissionController::isAuthorized('dashboard.index'); 
        });

        Gate::define('dashboard-report', function () {
            return PermissionController::isAuthorized('dashboard.report'); 
        });
    }
}
