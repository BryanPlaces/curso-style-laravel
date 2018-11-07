@extends('layout')


@section('title', "Usuario {$user->id}")

@section('content')

    <div class="card">
        <h4 class="card-header">Usuario {{$user->id}}</h4>

        <div class="card-body">
            <p>Nombre del usuario: {{ $user->name }}</p>
            <p>Correo electronico: {{ $user->email }}</p>


            <p>
                <a href="{{ route('users.index') }}" class="btn btn-link">Regresar al listado de usuarios</a>
            </p>

        </div>
    </div>


@endsection

