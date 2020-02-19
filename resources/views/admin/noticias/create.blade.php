@extends('layouts.admin')

@section('titulo', 'Administración | Crear noticia')
@section('titulo2', 'Noticias')

@section('breadcrumbs')
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <h3 class="card-title">Crear noticia</h3>
                    
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route('noticias.store')}}">
                            @csrf
                        <div class="form-group">

                            <label for="">Titulo</label>
                            <input type="text" name="txtTitulo" class="form-control" />
    
                        </div>

                        <div class="form-group" >
                            <label for="">Imagen de Portada</label>
                            <input type="file" name="imgPortada" class="form-control" />
                        
                        </div>

                        <div class="form-group">

                            <label >Cuerpo</label>
                            <textarea name="txtCuerpo" rows="12" class="form-control"></textarea>

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
@endsection

@section('estilos')
@endsection
