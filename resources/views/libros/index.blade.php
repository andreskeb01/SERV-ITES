@extends('layouts.master-layout')

@section('funciones')
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('biblioteca')}}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('biblioteca.administrar')}}">Administrar</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('cerrar_sesion') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary">Cerrar sesión</button>
                    </div>
                </form>
            </li>
        </ul>
    </div>
@endsection

@section('content')
<div class="container">
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Libros disponibles
                    @can('libros.create')
                        <a href="{{route('libros.create')}}" class="btn btn-sm btn-primary float-right">Crear</a>
                    @endcan
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                       <thead class="">
                        <tr>
                            <th with="10px">ID</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Número</th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                       </thead>
                        <tbody>
                            @forelse($libros as $libro)
                            <tr>
                                <td>{{$libro->id}}</td>
                                <td>{{$libro->titulo}}</td>
                                <td>{{$libro->autor}}</td>
                                <td>{{$libro->numero}}</td>
                                <td>
                                    @can('libros.show')
                                        <a href="{{route('libros.show', $libro->id)}}" class="btn btn-sm">Ver</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('libros.edit')
                                        <a href="{{route('libros.edit', $libro->id)}}" class="btn btn-sm">Editar</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('libros.delete')
                                        {!! Form::open(['route' => ['libros.delete', $libro->id], 'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-danger">Eliminar</button>
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                            @empty
                                <tr class="alert alert-danger">
                                    {{__("No tienes registrado ningun libro")}}
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            @if($libros->count())
                {{$libros->links()}}
            @endif
            <br>
        </div>
    </div>
</div>
@endsection
