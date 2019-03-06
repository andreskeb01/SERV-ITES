@extends('layouts.auth-layout')

@section('content')
        <br>
        <br>
        <br>
        <div class="full-height justify-content-center text-center">
            <div class="content">

                <h1>Servicios del Instituto de Estudios Superiores <br> Rene Descartes</h1>
                <br><br><br><br><br>
                <div class="links" >
                    <a href="{{ route('login_index')  }}" class="pr-5">Servicios Bibliotecarios</a>
                    <a href="{{ route('login_computo_index') }}" class="pl-5" >Servicios Centro de Cómputo</a>
                </div>
                    <br><br><br><br><br><br><br>
                <div>
                    <input type ='button' class="btn btn-primary py-2 px-5"  value = 'Registrarme' onclick="location.href = 'register'"/>
                </div>
            </div>
        </div>
        <br><br><br><br><br>
@endsection
@section('footer')
    <div class="py-3 bg-dark" style=" width: 100%; bottom: 0; position: fixed;">
        <p class="m-0 text-center text-white">&copy; 2019 <strong>Instituto René Descartes.</strong> Todos los derechos reservados</p>
    </div>
@endsection
