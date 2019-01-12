@extends('layouts.master-layout')

@section('funciones')
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('biblioteca')}}">Inicio</a>
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
                        Libros disponibles
                        @can('licenciaturas.create')
                            <a href="{{route('licenciaturas.create')}}" class="btn btn-sm btn-primary float-right">Crear</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="">
                            <tr>
                                <th with="10px">ID</th>
                                <th>Nombre</th>
                                <th>Clave</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($licenciaturas as $licenciatura)
                                <tr>
                                    <td>{{$licenciatura->id}}</td>
                                    <td>{{$licenciatura->nombre}}</td>
                                    <td>{{$licenciatura->clave}}</td>
                                    <td>
                                        @can('licenciaturas.show')
                                            <a href="{{route('licenciaturas.show', $licenciatura->id)}}" class="btn btn-sm">Ver</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('licenciaturas.edit')
                                            <a href="{{route('licenciaturas.edit', $licenciatura->id)}}" class="btn btn-sm">Editar</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('licenciaturas.delete')
                                            {!! Form::open(['route' => ['licenciaturas.delete', $licenciatura->id], 'method' => 'DELETE']) !!}
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
                @if($licenciaturas->count())
                    {{$licenciaturas->links()}}
                @endif
                <br>
            </div>
        </div>
    </div>
@endsection
