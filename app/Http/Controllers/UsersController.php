<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

// use App\Mail\TestEmail;

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

    public function ban(string $id) {
        $user = User::find($id);
        Gate::authorize('ban', $user);
        
        if(isset($user)) {
            // $data = ['message' => 'Saudações, sentimos muito em informar que você foi banido de nossa plataforma Adega App 💔'];

            // Mail::to(user->email)->send(new TestEmail($data));

            $user->delete();
        }
    }
}
