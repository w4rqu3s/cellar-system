<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller
{
    public function index() {
        $users = User::all();

        return view('usuarios.index', compact('users'));
    }

    public function show(string $id) {
        $user = User::find($id);

        if(isset($user)) {
            return view('usuarios.show', compact('user'));
        }
    }
}
