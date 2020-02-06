@extends('layouts.admin')

@section('titulo','Administración | Noticias')
@section('titulo2','Noticias')

@section('breadcrumbs')
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('exito'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> ¡Éxito!</h5>
                    {{Session::get('exito')}}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Error!</h5>
                    {{Session::get('error')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de noticias</h3>
                </div>
                <div class="card-body">
                    
                    <a href="{{route('noticias.create')}}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>Agregar noticia
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Noticia</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí van las noticias -->
                            @foreach($noticias as $noticia)
                                <tr>
                                    <td>{{$noticia->titulo}}</td>
                                    <td>
                                        <form method="POST" 
                                            action="{{route('noticias.destroy',$noticia->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <a 
                                            href="{{route('noticias.show',$noticia->id)}}"
                                            class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{route('noticias.edit',$noticia->id)}}" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="submit" 
                                                class="btn btn-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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