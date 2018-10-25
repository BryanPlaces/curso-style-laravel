<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {

    public function index() {

        $users = [
            "Joel",
            "Ellie",
            "Byron",
            "Timmy",
            "Vero",
            "<script>alert('Clicker')</script>"
        ];
        return view('users', [
            'users' => $users,
            'title' => "Listado de usuarios"
        ]);
    }

    public function show($id) {
        return "Mostrando detalle del usuario: {$id}";
    }

    public function create () {
        return "Crear nuevo usuario";
    }
}
