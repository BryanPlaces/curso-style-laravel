<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'Home';
});

Route::get('/usuarios', function () {
    return 'Usuarios';
});

Route::get ('usuarios/nuevo', function () {
    return "Crear nuevo usuario";
});

Route::get ('usuarios/{id}', function($id) {
    return "Mostrando detalle del usuario: {$id}";
});

Route::get('saludo/{name}/{nickname?}', function ($nombre, $nickname = null) {
    if ($nickname) {
        return "Bienvenido {$nombre}, tu apodo es {$nickname}";
    }else {
        return "Bienvenido {$nombre}, no tienes apodo";
    }
});
