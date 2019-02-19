@extends('layouts.master-layout')

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
            @can('libros.index')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('biblioteca.administrar')}}">Administrar</a>
                </li>
            @endcan
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

    <!-- Introduction Row -->
    <div style="padding: 20px; display: flex;">
        <h3>Bienvenido</h3>
        <div class="text-primary" style="padding: 8px; display: flex;">
            <h5>{{ auth()->user()->name }}</h5>
        </div>
    </div>
    @can('licenciaturas.index')
    <!-- Seccion de Licenciaturas -->

    <div class="row">
        @forelse($licenciaturas as $licenciatura)
            <div class="col-lg-4 col-sm-6 text-center mb-4">
                <img class="rounded-circle img-fluid d-block mx-auto" src="{{$licenciatura->url_image}}" alt="">
                <h4>
                    <br>{{$licenciatura->nombre}}
                </h4>
                <br>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="btn-group">
                        <a href="{{route('biblioteca.consulta', $licenciatura)}}" class="btn btn-sm btn-outline-primary">Ver licenciatura</a>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Info</button>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-danger">
                {{__("No tienes registrado ninguna licenciatura")}}
            </div>
        @endforelse


    </div>
    @endcan

@endsection

@section('footer')
    <div class="container">
        <p class="m-0 text-center text-white">&copy; 2018 <strong>Instituto René Descartes.</strong> Todos los derechos reservados</p>
    </div>
@endsection
