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
                                <th>Hora entrada</th>
                                <th>Total dispositivos</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($prestamos as $prestamo)
                                <tr>
                                    <td>{{$prestamo->id}}</td>
                                    <td>{{$prestamo->status}}</td>
                                    <td>{{$prestamo->usuario->name}}</td>
                                    <td>{{$prestamo->created_at}}</td>
                                    <td>{{$prestamo->total}}</td>
                                    <td>
                                        <a href="{{route('libros.show', $prestamo->id)}}" class="btn btn-sm">Ver detalle</a>
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['prestamos.delete', $prestamo], 'method' => 'DELETE']) !!}
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
