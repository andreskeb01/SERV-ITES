@extends('layouts.master-layout')

@section('funciones')
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('biblioteca')}}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('libros.index')}}">Libros</a>
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
                <div class="card-header">Libro</div>
                <div class="card-body">
                    <p><strong>Título:</strong> {{ $libro->titulo }}</p>
                    <p><strong>Autor:</strong> {{ $libro->autor }}</p>
                    <p><strong>Número:</strong> {{ $libro->numero }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
