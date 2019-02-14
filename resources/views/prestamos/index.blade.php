@extends('layouts.master-cc-layout')

@section('funciones')
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('centrocomputo')}}">Inicio</a>
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
                        Prestamos
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="">
                            <tr>
                                <th with="10px">ID</th>
                                <th>Estatus</th>
                                <th>Docente</th>
                                <th>Dispositivos</th>
                                <th>Hora entrada</th>
                                <th>Hora salida</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($prestamos as $prestamo)
                                <tr>
                                    <td>{{$prestamo->id}}</td>
                                    <td>{{$prestamo->status}}</td>
                                    <td>{{$prestamo->usuario->name}}</td>
                                    <td>{{$prestamo->total}}</td>
                                    <td>{{$prestamo->created_at}}</td>
                                    <td><input id="dtPickerHoraSalida" class="form-control" type="datetime-local"></td>
                                    <td>
                                        <a href="{{route('libros.show', $prestamo)}}" class="btn btn-sm">Ver detalle</a>
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['prestamos.update', $prestamo], 'method' => 'PUT']) !!}
                                        <button class="btn btn-sm btn-danger">Finalizar prestamo</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @empty
                                <tr class="alert alert-danger">
                                    {{__("No hay prestamos registrados")}}
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                @if($prestamos->count())
                    {{$prestamos->links()}}
                @endif
                <br>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("#dtPickerHoraSalida").val(getFullDatetime());
            //console.log(getFullDatetime());
        });

        function getFullDatetime() {
            var currentdate = new Date();
            var datetime =
                + currentdate.getFullYear() + "-"
                + getFormatedMonth(currentdate.getMonth()+1)  + "-"
                + currentdate.getDate() + "T"
                + (getFormatedHours(currentdate.getHours()-12)) + ":"
                + getFormatedMinutes(currentdate.getMinutes());

            return datetime;
        }

        function getFormatedMonth(unformatedMonth) {
            if(unformatedMonth < 10){
                unformatedMonth = '0'+unformatedMonth;
            }
            return unformatedMonth;
        }

        function getFormatedHours(unformatedHours) {
            if(unformatedHours < 10){
                unformatedHours = '0'+unformatedHours;
            }
            return unformatedHours;
        }

        function getFormatedMinutes(unformatedMinutes) {
            if(unformatedMinutes < 10){
                unformatedMinutes = '0'+unformatedMinutes;
            }
            return unformatedMinutes;
        }

        function getFormatedSeconds(unformatedSeconds) {
            if(unformatedSeconds < 10){
                unformatedSeconds = '0'+unformatedSeconds;
            }
            return unformatedSeconds;
        }


    </script>
@endsection
