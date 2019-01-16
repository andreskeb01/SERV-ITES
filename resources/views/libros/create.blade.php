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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Ingresa los datos del nuevo libro</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('libros.store') }}">
                            <div class="form-group" >
                                <label for="text">Titulo</label>
                                <input class="form-control"
                                       type="text"
                                       name="titulo"
                                       placeholder="Titulo del libro">
                            </div>
                            <div class="form-group" >
                                <label for="text">Autor</label>
                                <input class="form-control"
                                       type="text"
                                       name="autor"
                                       placeholder="Autor del libro">
                            </div>
                            <div class="form-group" >
                                <label for="text">Numero</label>
                                <input class="form-control"
                                       type="number"
                                       name="numero_libro"
                                       placeholder="Número del libro">
                            </div>
                            <div class="form-group">
                                <label for="select_licenciatura">Seleccione la licenciatura</label>
                                <select class="form-control" id="select_licenciatura">
                                    @foreach($licenciaturas as $licenciatura)
                                        <option class="form-control" value="{{$licenciatura->id}}">
                                            {{$licenciatura->nombre}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label class="form-text" for="select_cuatrimestre">Seleccione el cuatrimestre</label>
                                    <select class="form-control" id="select_cuatrimestre">
                                        @foreach($licenciaturas as $licenciatura)
                                            <option value="{{$licenciatura->id}}">
                                                {{$licenciatura->nombre}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label class="form-text" for="select_materia">Seleccione la materia</label>
                                    <select class="form-control" id="select_materia">
                                        @foreach($licenciaturas as $licenciatura)
                                            <option value="{{$licenciatura->id}}">
                                                {{$licenciatura->nombre}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-primary py-1 px-3 "> Guardar </button>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        //Accedo a la licenciatura seleccionada
        $("#select_licenciatura").change(function () {
            //Guardo el id de la licenciatura seleccionada (propiedad value)
            var selected_licenciatura = $(this).children("option:selected").val();
            $("#select_materia").prop('value', selected_licenciatura);
        });
    });
</script>
@endsection
