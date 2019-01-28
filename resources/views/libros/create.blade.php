@extends('layouts.master-layout')

@section('funciones')
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('biblioteca')}}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('libros.index')}}">Libros</a>
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
                    <div class="card-header">Ingresa los datos del nuevo libro</div>
                    <div class="card-body">
                        <form id="form_libro_create" method="POST" action="{{ route('libros.store') }}">
                            <div class="form-group" >
                                <label for="text">Titulo</label>
                                <input class="form-control"
                                       type="text"
                                       name="titulo"
                                       placeholder="Titulo del libro">
                            </div>
                            <div class="form-group" >
                                <label for="text">Autor</label>
                                <input class="form-control"
                                       type="text"
                                       name="autor"
                                       placeholder="Autor del libro">
                            </div>
                            <div class="form-group" >
                                <label for="text">Numero</label>
                                <input class="form-control"
                                       type="number"
                                       name="numero"
                                       placeholder="Número del libro">
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
                                <div class="form-group col">
                                    <label class="form-text" for="select_materia">Seleccione la materia</label>
                                    <select class="form-control" id="select_materia" disabled="true">
                                    </select>
                                </div>
                            </div>
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
        });

        //Accedo al cuatrimestre seleccionado
        $("#select_cuatrimestre").change(function (event) {
            event.preventDefault();
            //Guardo el id del cuatrimestre seleccionado (propiedad value)
            var selected_cuatrimestre = $(this).children("option:selected").val();
            //Guardo el id de la licenciatura seleccionada
            var selected_licenciatura = $('#select_licenciatura').children("option:selected").val();

            //Cargo las materias por ajax (con el cuatrimestre y licenciatura_id proporcionados)
            $.ajax({
                type: 'GET',
                url: '/materia/'+selected_cuatrimestre+'/'+selected_licenciatura,
                success: function (response) {

                    //Borro los option de materia si hubiese
                    if(options_materia != undefined){
                        options_materia = $(".materia_option");
                        options_materia.remove();
                    }
                    response.forEach(function (item, index) {
                        select_materia.append(
                            '<option class="form-control materia_option" value="'+item.id+'">'+item.nombre+'</option>'
                        );
                    });
                    //console.log(response);
                    select_materia.prop('disabled', false);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        //Captura el evento de clic en el boton guardar y envia
        //el objeto libro (JSON) por AJAX a la url de libros.store
        $("#form_libro_create").submit(function (event) {

            var data = {
                libro:{
                    titulo: $('input[name="titulo"]').val(),
                    autor: $('input[name="autor"]').val(),
                    numero: $('input[name="numero"]').val()
                },
                materia:{
                    id: $("#select_materia").children("option:selected").val()
                }
            };

            console.log("Data enviada: "+data.toString());

            $.ajax({
                type: $(this).attr("method"),
                dataType: 'json',
                url: $(this).attr("action"),
                data: data,
                beforeSend: function () {

                },
                success: function (response) {
                    console.log(response);
                    window.location.href = "/libros";
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
