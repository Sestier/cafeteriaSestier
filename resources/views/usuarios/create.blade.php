@extends('layouts.default')
@section('content')
<h1>Crear usuario</h1>
<form id="frmCrearUsuario" action="{{route('usuarios.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Correo electrónico</label>
        <input type="email" name="correo" class="form-control">
    </div>
    <div class="form-group">
        <label>Contraseña</label>
        <input type="password" id="txtPassword" name="password" class="form-control">
    </div>
    <div class="form-group">
        <label>Confirmar contraseña</label>
        <input type="password" id="txtConfirmPassword" name="c_password" class="form-control">
    </div>
    <div class="form-group">
        <label>Tipo Usuario</label>
        <select class="form-control" name="tipoUsuario">
            @foreach($tiposUsuario as $tipo)
                <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="button" id="btnEnviar">Crear usuario</button>
    </div>
</form>
@endsection

@section('customScripts')
    <script src="/js/createusuario.js"></script>
@endsection