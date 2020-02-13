<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\Usuario;
use App\User;

class UsuarioController extends Controller
{
    

    public function __construct() {

        $this->middleware('auth');



    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $usuarios = Usuario::all();

        $argumentos = array();
        $argumentos['usuarios'] = $usuarios;

        return view('admin.usuarios.index', $argumentos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $verificacion = User::where('email', $request->input('txtCorreo'))->first();
        if($verificacion)
        {
            return redirect()->route('usuarios.create')->with('error', 'El Usuario ' . $request->input('txtCorreo') . ' ya existe');
        }

        $usuario = new Usuario();
        $usuario->name = $request->input('txtNombre');
        $usuario->email = $request->input('txtCorreo');
        $usuario->password = bcrypt($request->input('txtContraseña'));

        if ($usuario->save()) {

            //Si pude guardar la noticia
            return redirect()->route('usuarios.index')->with('exito', '¡El usuario ha sido guardada con éxito!');
            

        }

        //Aqui no se pudo guardar
        return redirect()->route('usuarios.index')->with('error', 'No se pudo agregar el usuario, llama al 911');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
        $usuario = Usuario::find($id);
        //Si encontro la noticia redirigete al edit
        if($usuario){

            $argumentos = array();
            $argumentos['usuario'] = $usuario;
            return view('admin.usuarios.show', $argumentos);

        }
        return redirect()->route('usuarios.index')->with('error', 'No se encontró la noticia');

        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $usuario = Usuario::find($id);
        //Si encontro la noticia redirigete al edit
        if($usuario){

            $argumentos = array();
            $argumentos['usuario'] = $usuario;
            return view('admin.usuarios.edit', $argumentos);

        }
        return redirect()->route('usuarios.index')->with('error', 'No se encontró el usuario');

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

        $usuario = Usuario::find($id);
        if($usuario){

            $usuario->name = $request->input('txtNombre');
            $usuario->email = $request->input('txtCorreo');
            $usuario->password = bcrypt($request->input('txtContraseña'));

            if($usuario->save()){

                return redirect()->route('usuarios.edit',$id)->with('exito','¡El Usuario se ACTUALIZÓ exitosamente!');
                
            }
            
            return redirect()->route('usuarios.edit',$id)->with('error','El Usuario NO se pudo actualizar');
            
        }

        return redirect()->route('usuarios.index')->with('error','No se encontró el usuario');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $usuario = Usuario::find($id);
        if($usuario){

            if($usuario->delete()){

                return redirect()->route('usuarios.index')->with('exito', '¡Noticia eliminada exitosamente!');

            }

            return redirect()->route('usuarios.index')->with('error', 'No se puedo eliminar la noticia');

        }

        return redirect()->route('usuarios.index')->with('error', 'No se encontró la noticia');

    }

    

}
