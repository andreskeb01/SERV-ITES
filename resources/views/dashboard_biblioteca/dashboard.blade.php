@extends('layouts.master-layout')

@section('content')
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <img src="/base-biblioteca/images/logo.jpg" height="40" width="100">
            <a class="navbar-brand" href="#">ITES "Rene Descartes"</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
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
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Introduction Row -->
        <h1 class="my-4">
            Bienvenido <br>
            <small>Selecciona tu Licenciatura.</small>

        </h1>


        <!-- Team Members Row -->
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

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
        </div>
        <!-- /.container -->
    </footer>
    @endsection
