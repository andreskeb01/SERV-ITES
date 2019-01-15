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
    @php
        $licenciatura_value = "";
    @endphp
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">Ingresa los datos del nuevo libro</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('libros.store') }}">
                            <div class="form-group" >
                                <label for="text">Titulo</label>
                                <input class="form-control"
                                       type="text"
                                       name="titulo"
                                       placeholder="Titulo del Libro.">
                            </div>
                            <div class="form-group" >
                                <label for="text">Autor</label>
                                <input class="form-control"
                                       type="text"
                                       name="autor"
                                       placeholder="Autor del Libro.">
                            </div>
                            <div class="form-group" >
                                <label for="text">Numero</label>
                                <input class="form-control"
                                       type="number"
                                       name="numero_libro"
                                       placeholder="Numero del Libro.">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Seleccione la Licenciatura</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    @foreach($licenciaturas as $licenciatura)
                                        <option class="form-control" href="#">
                                            {{$licenciatura_value=$licenciatura->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Seleccione la Materia</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    @foreach($licenciaturas as $licenciatura)
                                        @if($licenciatura->name == $licenciatura_value)
                                        <option class="form-control" href="#">
                                                {{$licenciatura->materias}}
                                        </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <br>
                            <div class="form-group ">
                                <button class="btn btn-primary py-1 px-3 "> Guardar </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
