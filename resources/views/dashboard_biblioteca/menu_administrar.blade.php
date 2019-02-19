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
                    <a class="nav-link" href="{{route('libros.index')}}">Administrar</a>
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
    <br>
    <br>
    <br>
    <br>
    <div class="row" >
        <div class="col-lg-4 text-center">
            <img id="libro" class="rounded-circle img-fluid d-block mx-auto" width="140" height="140" src="/base-biblioteca/images/menu_libro.png" alt="">
            <h2>Libros</h2>
            <p>Administrar libros. </p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 text-center">
            <img  id="materia" class="rounded-circle img-fluid d-block mx-auto" width="140" height="140" src="/base-biblioteca/images/menu_materia.png" alt="">
            <h2>Materias</h2>
            <p>Administrar materias.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 text-center">
            <img id="usuario"class="rounded-circle img-fluid d-block mx-auto" width="100" height="10" src="/base-biblioteca/images/menu_usuario.png" alt="">
            <h2>Usuarios</h2>
            <p>Administrar usuarios.</p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection

@section('footer')
    <div class="container">
        <p class="m-0 text-center text-white">&copy; 2018 <strong>Instituto René Descartes.</strong> Todos los derechos reservados</p>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $("#libro").click(function(){
                window.location.href = "/libros";
            });
            $("#materia").click(function(){
                window.location.href = "/materias";
            });

            $("#usuario").click(function(){
                window.location.href = "/usuarios";
            });
        });
    </script>
    @endsection
