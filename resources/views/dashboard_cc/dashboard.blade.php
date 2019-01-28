@extends('layouts.master-cc-layout')

@section('funciones')
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="">Inicio
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Acerca de</a>
            </li>
            <!-boton administrar para acceder al inventario-->
            @can('inventario.index')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('inventario.index')}}">Administrar</a>
                </li>
                <!--------------------------------------------------------------------------->
            @endcan
            <li class="nav-item">
                <form method="POST" action="{{ route('computo_cerrar_sesion') }}">
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

    <!-- Introduction Row -->
    <div style="padding: 20px; display: flex;">
        <h3>Bienvenido</h3>
        <div class="text-primary" style="padding: 8px; display: flex;">
            <h5>{{ auth()->user()->name }}</h5>
        </div>
    </div>
    @can('inventario.index')
    <!-- Seccion de inventario -->


<!---->
    <div class="form-row">
        <div class="form-group col-5">
            <label class="form-text" for="select_cuatrimestre">Categoria de dispositivo</label>
            <select class="form-control" id="select_cuatrimestre" disabled="true">
            </select>
        </div>
        <div class="form-group col">
            <label class="form-text" for="select_materia">Tipo</label>
            <select class="form-control" id="select_materia" disabled="true">
            </select>
        </div>

        <div class="form-group col">
            <form class="form-inline">
                <label class="form-text" for="input_busqueda">Busqueda</label>
                <div id="input_busqueda" class="form-group pt-2">
                    <input  class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

                </div>

            </form>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="">
                <tr>
                    <th with="10px">ID</th>
                    <th>Nombre</th>
                    <th>Num serie</th>
                    <th>Modelo</th>
                    <th>Descripcion</th>
                    <th>Clave</th>
                    <th colspan="3">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @forelse($inventario as $dispositivo)
                    <tr>
                        <td>{{$dispositivo->id}}</td>
                        <td>{{$dispositivo->nombre}}</td>
                        <td>{{$dispositivo->num_serie}}</td>
                        <td>{{$dispositivo->modelo}}</td>
                        <td>{{$dispositivo->descripcion}}</td>
                        <td>{{$dispositivo->clave}}</td>
                        <td>
                            @can('inventario.show')
                                <a href="{{route('inventario.show', $dispositivo->id)}}" class="btn btn-sm">Ver</a>
                            @endcan
                        </td>
                        <td>
                            @can('inventario.edit')
                                <a href="{{route('inventario.edit', $dispositivo->id)}}" class="btn btn-sm">Editar</a>
                            @endcan
                        </td>
                        <td>
                            @can('inventario.delete')
                                {!! Form::open(['route' => ['inventario.delete', $dispositivo->id], 'method' => 'DELETE']) !!}
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr class="alert alert-danger">
                        {{__("No tienes ningun dispositivo")}}
                    </tr>

                @endforelse
                </tbody>
            </table>
        </div>

    </div>
    @endcan

@endsection

@section('footer')
    <div class="container">
        <p class="m-0 text-center text-white">&copy; 2018 <strong>Instituto René Descartes.</strong> Todos los derechos reservados</p>
    </div>
@endsection
