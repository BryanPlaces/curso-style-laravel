<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {

    public function index() {


        $users = User::all();
        $title = 'Listado de usuarios';


//        return view('users.index')
//            -> with('users', User::all())
//            -> with('title', 'Listado de usuarios');

        return view('users.index', compact('title', 'users'));
    }

    public function show(User $user) {

        // simplifica el codigo de abajo, carga la vista errors.404
//        $user = User::findOrFail($id);

//        $user = User::find($id);
//
//        if($user == null) {
//            return response()->view('errors.404', [], 404);
//        }

        return view('users.show', compact('user'));
    }

    public function create () {
        return view('users.create');
    }

    public function store() {

        $data=request()->validate([
            'name'=>'required',
            'email'=> ['required', 'email', 'unique:users,email'],
            'password'=> ['required', 'min:6']
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'password.required' => 'El campo password es obligatorio',

        ]);

        User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password' => bcrypt($data['password'])
        ]);


        //return redirect('usuarios');
        return redirect()->route('users');
    }
}
