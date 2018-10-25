<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeUserController extends Controller {

    public function index1($name) {

        $name = ucfirst($name);

        return "Bienvenido {$name}";
    }

    public function index2($name, $nickname) {

        $name = ucfirst($name);

        return "Bienvenido {$name}, tu apodo es {$nickname}";
    }
}
