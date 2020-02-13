@extends('layouts.admin')

@section('titulo', 'Administración | Editar usuario')
@section('titulo2', 'Usuarios')

@section('breadcrumbs')
@endsection

@section('contenido')

<a class="btn btn-success btn-sm" style="margin-left: 11px" href="{{route('usuarios.index')}}">
    <i class="fas fa-arrow-left"></i>
        Volver a lista de usuarios
</a>

<br/>
<br/>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            @if(Session::has('exito'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> ¡EXITO!</h5>
                    {{Session::get('exito')}}
                </div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> ¡ERROR!</h5>
                    {{Session::get('error')}}
                </div>
            @endif

            <div class="card">
                <div class="card-header">

                    <h3 class="card-title"> Editar usuarios: {{$usuario->id}} </h3>
                    
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('usuarios.update',$usuario->id)}}">

                            @csrf
                            @method('PUT')

                        <div class="form-group">

                            <label >Nombre</label>
                            <input name= "txtNombre" type="text" value="{{$usuario->name}}" class="form-control" />
    
                        </div>
                        <div class="form-group">

                            <label >Email</label>
                            <input name= "txtCorreo" type="text" value="{{$usuario->email}}" class="form-control" readonly/>
    
                        </div>
                        <div class="form-group">

                            <label >Contraseña</label>
                            <input id="password" type="password" name="txtContraseña" value="" class="form-control" />
    
                        </div>
                        <div class="form-group">

                            <label >Confirmar Contraseña</label>
                            <input id="confirm_password" type="password" name="txtContraseña" value="" class="form-control" />
    
                        </div>
                        <div class="form-group">

                            <button class="btn btn-primary">Actualizar</button>

                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection

@section('estilos')
@endsection
