@extends('layouts.master-layout')

@section('funciones')
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('biblioteca')}}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('biblioteca.administrar')}}">Administrar</a>
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
                    <div class="card-header">Ingresa los datos de la nueva materia</div>
                    <div class="card-body">
                        <form id="form_materia_create" method="POST" action="{{ route('materias.store') }}" >
                            <div class="form-group" >
                                <label for="text">Nombre</label>
                                <input class="form-control"
                                       type="text"
                                       name="nombre"
                                       placeholder="Nombre de la materia">
                            </div>
                            <div class="form-group" >
                                <label for="text">Clave</label>
                                <input class="form-control"
                                       type="text"
                                       name="clave"
                                       placeholder="Clave de la materia">
                            </div>
                            <div class="form-group">
                                <label for="select_licenciatura">Seleccione la licenciatura</label>
                                <select class="form-control" id="select_licenciatura">
                                    @foreach($licenciaturas as $licenciatura)
                                        <option class="form-control licenciatura_option" value="{{$licenciatura->id}}">
                                            {{$licenciatura->nombre}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-5">
                                    <label class="form-text" for="select_cuatrimestre">Seleccione el cuatrimestre</label>
                                    <select class="form-control" id="select_cuatrimestre" disabled="true">
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-primary py-1 px-3"> Guardar </button>
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

            var select_cuatrimestre = $('#select_cuatrimestre');
            var select_materia = $('#select_materia');

            var options_licenciatura = $(".licenciatura_option");
            var options_cuatrimestre = $(".cuatrimestre_option");
            var options_materia = $(".materia_option");

            //Accedo a la licenciatura seleccionada
            $("#select_licenciatura").change(function (event) {

                event.preventDefault();

                //Guardo el id de la licenciatura seleccionada (propiedad value)
                var selected_licenciatura = $(this).children("option:selected").val();

                //Cargo la licenciatura por ajax (para ver su numero de cuatrimestres)
                $.ajax({
                    type: 'GET',
                    url: '/licenciatura/'+selected_licenciatura,
                    success: function (response) {

                        //Borro los option de cuatrimestre y materia si hubiese
                        console.log(options_cuatrimestre+""+options_materia);
                        options_cuatrimestre = $(".cuatrimestre_option");
                        options_materia = $(".materia_option");
                        options_materia.remove();
                        options_cuatrimestre.remove();
                        //Bloqueo los select de cuatrimestre y materia
                        select_cuatrimestre.prop('disabled', true);
                        //   select_materia.prop('disabled', true);

                        //Agrego los option al select de cuatrimestres
                        for (i=1; i<=response.cuatrimestres; i++){
                            select_cuatrimestre.append(
                                '<option class="form-control cuatrimestre_option" value="'+i+'">' +i+'</option>'
                            );
                        }
                        //Desbloqueo el select de cuatrimestre
                        select_cuatrimestre.prop('disabled', false);

                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
                //$("#select_materia").prop('value', selected_licenciatura);
            });



            //Captura el evento de clic en el boton guardar y envia
            //el objeto libro (JSON) por AJAX a la url de libros.store
            $("#form_materia_create").submit(function (event) {

                event.preventDefault();

                var nombre = $('input[name="nombre"]').val();
                var clave = $('input[name="clave"]').val();
                var id_licenciatura = $("#select_licenciatura").children("option:selected").val();
                var cuatrimestre = $("#select_cuatrimestre").children("option:selected").val();
                var materia = {
                    "nombre" :nombre,
                    "clave" : clave,
                    "id_licenciatura": id_licenciatura,
                    "cuatrimestre" : cuatrimestre,
                };

                $.ajax({
                    url: $(this).attr("action"),
                    type: $(this).attr("method"),
                    data: materia,
                    dataType: 'json',
                    beforeSend: function () {
                        console.log(materia);
                    },
                    success: function (response) {
                        console.log(response);
                        window.location.href = "/biblioteca/administrar";
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
                return false;
            });
        });
    </script>
@endsection
