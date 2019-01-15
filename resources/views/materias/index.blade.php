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
<div class="row mh-100 h-100">
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md8 col-md-offset-2">
                <div class="card">
                    <br>
                    <p class="h4 font-weight-bold font-italic text-center" >{{$licenciatura->nombre}}</p>
                    <div class="card-header"><h5>Selecciona tu cuatrimestre</h5></div>
                    <div class="card-body">
                        <div class="d-flex">
                            <ul class="nav nav-pills flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#´1´_cuatrimestre" role="tab" data-toggle="tab">Cuatrimestre 1</a>
                                </li>
                                @for($i = 2; $i<=$licenciatura->cuatrimestres; $i++)
                                    <li class="nav-item">
                                        <a class="nav-link" href="#´{{$i}}´_cuatrimestre" role="tab" data-toggle="tab">Cuatrimestre {{$i}}</a>
                                    </li>
                                @endfor
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content" style="width: 600px; padding-left: 25px">
                                <div role="tabpanel" class="tab-pane fade show active" id="´1´_cuatrimestre">
                                    <h6><p class="font-italic">{{$licenciatura->materias[0]->nombre}}</p></h6>
                                </div>
                                @for($i = 2; $i<=$licenciatura->cuatrimestres; $i++)
                                    <div role="tabpanel" class="tab-pane fade in active" id="´{{$i}}´_cuatrimestre">
                                        @foreach($licenciatura->materias as $materia)
                                            @if($materia->cuatrimestre==$i)
                                                <h6><p class="font-italic">{{$materia->nombre}}</p></h6>
                                            @endif
                                        @endforeach
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>
</div>
@endsection
