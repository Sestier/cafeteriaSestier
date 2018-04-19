@extends('layouts.default')
@section('content')
<h1>Usuarios</h1>
<a href="{{route('usuarios.create')}}">
    <button class="btn btn-primary ">Crear usuario</button>
</a>

<table class="table table-stripped">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{$usuario->email}}</td>
                <td>{{$tiposUsuario[$usuario->idTipoUsuario]}}</td>
                <td><button class="btn btn-primary">Editar</button></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection