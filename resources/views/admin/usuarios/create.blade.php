@extends('layouts.admin')

@section('titulo', 'Administración | Crear usuario')
@section('titulo2', 'Usuarios')

@section('breadcrumbs')
@endsection

@section('contenido')
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

                    <h3 class="card-title">Crear usuario</h3>
                    
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('usuarios.store')}}">
                            @csrf
                        <div class="form-group">

                            <label for="">Nombre</label>
                            <input type="text" name="txtNombre" class="form-control" required/>
    
                        </div>
                        <div class="form-group">

                            <label for="">Correo</label>
                            <input type="email" name="txtCorreo" class="form-control" required/>
    
                        </div>
                        <div class="form-group">

                            <label for="">Contraseña</label>
                            <input id="password" type="password" name="txtContraseña" class="form-control" required/>
    
                        </div>
                        <div class="form-group">

                            <label for="">Confirmar contraseña</label>
                            <input id="confirm_password" type="password" name="txtContraseña" class="form-control" required/>
    
                        </div>
                        
                        <div class="form-group">

                            <button class="btn btn-primary">Guardar</button>

                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">
    var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password");
    function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Las contraseñas no coinciden.");
    } else {
        confirm_password.setCustomValidity('');
    }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
 </script>

@endsection

@section('estilos')
@endsection
