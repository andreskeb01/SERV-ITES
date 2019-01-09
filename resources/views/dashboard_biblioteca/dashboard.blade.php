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

    <!-- Seccion de licenciaturas -->
    <div class="row">
        <div class="col-lg-4 col-sm-6 text-center mb-4">
            <img class="rounded-circle img-fluid d-block mx-auto" src="/base-biblioteca/images/Derecho.png" alt="">
            <h3>
                <br>Licenciatura en Derecho.
            </h3>

        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
            <img class="rounded-circle img-fluid d-block mx-auto" src="/base-biblioteca/images/Contabilidad.jpg" alt="">
            <h3>
                <br>Licenciatura de Contaduria.
            </h3>

        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
            <img class="rounded-circle img-fluid d-block mx-auto" src="/base-biblioteca/images/Administracion.jpg" alt="">
            <h3>
                <br>Licenciatura en Administración de Empresas.
            </h3>
        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
            <img class="rounded-circle img-fluid d-block mx-auto" src="/base-biblioteca/images/Pedagogia.jpg" alt="">
            <h3>
                <br> Licenciatura en Pedagogia.
            </h3>
        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
            <img class="rounded-circle img-fluid d-block mx-auto" src="/base-biblioteca/images/Comunicacion.jpg" alt="">
            <h3>
                <br>Licenciatura en Ciencias de la Comunicación.
            </h3>
        </div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
            <img class="rounded-circle img-fluid d-block mx-auto" src="/base-biblioteca/images/Sistemas.jpg" alt="">
            <h3>
                <br>Licenciatura en Sistemas Computacionales Administrativos.
            </h3>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-3 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
        </div>
        <!-- /.container -->
    </footer>
@endsection
