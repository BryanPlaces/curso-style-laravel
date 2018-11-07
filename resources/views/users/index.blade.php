@extends ('layout')

@section('title','Usuarios')

@section('content')
    <h1> {{ $title}} </h1>

    <a href="{{ route('users.create') }}">Nuevo Usuario</a>

    <ul>

        @forelse( $users as $user)

            <li>
                {{$user->name}}, ({{ $user->email }})
                <a href="{{ route('users.show', $user) }}">Ver detalles</a> |
                <a href="{{ route('users.edit', $user) }}">Editar</a> |

                <form method="POST" action="{{ route('users.destroy', $user) }}">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button type="submit">Eliminar</button>

                </form>
            </li>
        @empty

            <li>No hay usuarios registrados.</li>

        @endforelse
    </ul>
@endsection

@section('sidebar')

    @parent

    <h2>Barra lateral personalizada!</h2>
@endsection











