<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\User;

class UsersController extends Controller
{
    public function index() {
        Gate::authorize('viewAny', User::class);

        $users = User::all();

        return view('usuarios.index', compact('users'));
    }

    public function show(string $id) {
        $user = User::find($id);
        
        Gate::authorize('view', $user);

        if(isset($user)) {
            return view('usuarios.show', compact('user'));
        }
    }
}
