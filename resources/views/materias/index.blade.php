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
        <div class="row justify-content-center">
            <div class="col-md8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        Materias disponibles
                        @can('materias.create')
                            <a href="{{route('materias.create')}}" class="btn btn-sm btn-primary float-right">Crear</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="">
                            <tr>
                                <th with="10px">ID</th>
                                <th>Nombre</th>
                                <th>Clave</th>
                                <th>Cuatrimestre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($materias as $materia)
                                <tr>
                                    <td>{{$materia->id}}</td>
                                    <td>{{$materia->nombre}}</td>
                                    <td>{{$materia->clave}}</td>
                                    <td>{{$materia->cuatrimestre}}</td>
                                    <td>
                                        @can('materias.show')
                                            <a href="{{route('materias.show', $materia->id)}}" class="btn btn-sm">Ver</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('materias.edit')
                                            <a href="{{route('materias.edit', $materia->id)}}" class="btn btn-sm">Editar</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('materias.delete')
                                            {!! Form::open(['route' => ['materias.delete', $materia->id], 'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-danger">Eliminar</button>
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr class="alert alert-danger">
                                    {{__("No tienes registrado ninguna materia")}}
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                @if($materias->count())
                    {{$materias->links()}}
                @endif
                <br>
            </div>
        </div>
    </div>
@endsection
