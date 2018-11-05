@extends('layout')


@section('title', "Crear usuario")

@section('content')
    <h1>Crear usuario</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <h5>Por favor corrige los errores debajo:</h5>

            {{--<ul>--}}
                {{--@foreach($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        </div>
    @endif


    <form method="POST" action="{{ url('usuarios') }}">

        {!! csrf_field() !!}

        <label for="name">Nombre: </label>
        <input type="text" name="name" id="name" placeholder="Pedro Perez" value="{{ old('name') }}">

        @if ($errors ->has('name'))
            <p>{{ $errors->first('name') }}</p>
        @endif

        <br>

        <label for="email">Correo electrónico</label>
        <input type="text" name="email" id="email" placeholder="pedro@example.com" value="{{ old('email') }}">

        @if ($errors -> has('email'))
            <p> {{ $errors->first('email') }}</p>
        @endif

        <br>

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="Mayor a 6 caracteres">

        @if ($errors -> has('password'))
            <p> {{ $errors->first('password') }}</p>
        @endif
        <br>

        <button type="submit">Crear usuario</button>


    </form>

    <p>
        <a href={{ route('users') }}>Regresar al listado de usuarios</a>
    </p>

@endsection

