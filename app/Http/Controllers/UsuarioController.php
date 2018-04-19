<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $usuarios = \App\User::all();
       $tipoUsuario = \App\TipoUsuario::all()->pluck('descripcion', 'id');

       $argumentos = array();
       $argumentos["usuarios"] = $usuarios;
       $argumentos["tiposUsuario"] = $tipoUsuario;

       return view('usuarios.index', $argumentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposUsuario = \App\TipoUsuario::all();

        $argumentos = array();
        $argumentos['tiposUsuario'] = $tiposUsuario;

        return view('usuarios.create', $argumentos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Obtener inputs
        $correo = $request->input('correo');
        $password = $request->input('password');
        $tipoUsuario = $request->input('tipoUsuario');

        //Crear nuevo registro
        $nuevoUSuario = new \App\User;
        $nuevoUSuario->email = $correo;
        $nuevoUSuario->idTipoUsuario = $tipoUsuario;
        $nuevoUSuario->password = bcrypt($password);

        $respuesta = array();
        $respuesta["exito"] = false;
        if ($nuevoUSuario->save()) {
            $respuesta["exito"] = true;
        }

        return redirect()->route('usuarios.index',$respuesta);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
