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
                                <th colspan="1">&nbsp;</th>
                                <th>Hora salida</th>
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
                                    <td>
                                        <a href="{{route('libros.show', $prestamo)}}" class="btn btn-sm">Ver detalle</a>
                                    </td>
                                    <td>
                                        <div class="form-group row">
                                            {!! Form::open(['route' => ['prestamos.delete', $prestamo], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                                            <input id="dtPickerHoraSalida" name="dtPickerHoraSalida" class="form-control mb-2 col-8" type="datetime-local">
                                            <button class="btn btn-sm btn-danger  mb-2 col-4">Finalizar prestamo</button>
                                            {!! Form::close() !!}
                                        </div>
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
@section('footer')
    <div class="py-3 bg-primary" style=" width: 100%; bottom: 0; position: fixed;">
        <p class="m-0 text-center text-white">&copy; 2019 <strong>Instituto René Descartes.</strong> Todos los derechos reservados</p>
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
