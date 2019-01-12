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
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        Libros disponibles

                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            @for($i = 1; $i<=$licenciatura->cuatrimestres; $i++)
                            <li class="nav-item">
                                <a class="nav-link" href="#´{{$i}}´_cuatrimestre" role="tab" data-toggle="tab">{{$i}}</a>
                            </li>
                            @endfor
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            @for($i = 1; $i<=$licenciatura->cuatrimestres; $i++)
                                <div role="tabpanel" class="tab-pane fade in active" id="´{{$i}}´_cuatrimestre">
                                    @foreach($licenciatura->materias as $materia)
                                        @if($materia->cuatrimestre==$i)
                                            {{$materia->nombre}}
                                            <br>
                                        @endif
                                    @endforeach
                                </div>
                             @endfor
                        </div>
                    </div>
                </div>
            </div>
                 </div>
                <br>
                <br>
            </div>
        </div>
    </div>
@endsection