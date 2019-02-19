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
                        Materias disponibles
                        @can('usuarios.create')
                            <a href="{{route('usuarios.create')}}" class="btn btn-sm btn-primary float-right">Crear</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="">
                            <tr>
                                <th with="10px">ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->id}}</td>
                                    <td>{{$usuario->nombre}}</td>
                                    <td>{{$usuario->email}}</td>
                                    <td>
                                        @foreach($usuario->getRoles() as $role)
                                            {{$role}}
                                            @endforeach
                                    </td>
                                    <td>
                                        @can('usuarios.show')
                                            <a href="{{route('materias.show', $usuario->id)}}" class="btn btn-sm">Ver</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('usuarios.edit')
                                            <a href="{{route('materias.edit', $usuario->id)}}" class="btn btn-sm">Editar</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('usuarios.delete')
                                            {!! Form::open(['route' => ['usuarios.delete', $usuario->id], 'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-danger">Eliminar</button>
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr class="alert alert-danger">
                                    {{__("No tienes registrado ningun usuario")}}
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                @if($usuarios->count())
                    {{$usuarios->links()}}
                @endif
                <br>
            </div>
        </div>
    </div>
@endsection
