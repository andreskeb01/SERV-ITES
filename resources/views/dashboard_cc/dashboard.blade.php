@extends('layouts.master-cc-layout')

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
            <!-boton administrar para acceder al inventario-->
            @can('inventario.index')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('inventario.index')}}">Administrar</a>
                </li>
                <!--------------------------------------------------------------------------->
            @endcan
            <li class="nav-item">
                <form method="POST" action="{{ route('computo_cerrar_sesion') }}">
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

    @can('inventario.index')

    <div class="row">
        <div class="form-group col-7">
            <h5 class="card-title">Equipos</h5>
            <div class="form-row">
                <div class="form-group col-lg-3">
                    <label class="form-text" for="select_categoria">Categoria</label>
                    <select class="form-control" id="select_categoria">
                        @foreach($categorias as $categoria)
                            <option class="form-control" value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <label class="form-text" for="select_tipo">Tipo</label>
                    <select class="form-control" id="select_tipo" disabled="true">
                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <label class="form-text" for="input_busqueda">Buscar por nombre</label>
                    <form class="form-inline" method="GET" action="{{ route('centrocomputo') }}">
                        <div id="input_busqueda" class="form-group">
                            <input  class="form-control px-2 mr-sm-2" name="nombre" type="search" placeholder="Ej. HP, Mac, etc" aria-label="Search">
                            <button class="btn btn-outline-primary " type="submit">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row" style="padding-right: 30px">
                <div id="tabla_inventario_content">
                    @if($inventario->isNotEmpty())
                        <table class="table table-hover" id="tabla_inventario">
                            <thead class="">
                            <tr>
                                <th with="10px">ID</th>
                                <th>Nombre</th>
                                <th>Num serie</th>
                                <th>Modelo</th>
                                <th>Descripcion</th>
                                <th>Clave</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody id="body_inventario">
                            @foreach($inventario as $dispositivo)
                                <tr>
                                    <td>{{$dispositivo->id}}</td>
                                    <td>{{$dispositivo->nombre}}</td>
                                    <td>{{$dispositivo->num_serie}}</td>
                                    <td>{{$dispositivo->modelo}}</td>
                                    <td>{{$dispositivo->descripcion}}</td>
                                    <td>{{$dispositivo->clave}}</td>
                                    <td><button class="btn btn-sm btn-primary">Seleccionar</button></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif()
                </div>
            </div>
        </div>
        <div class="form-group col-5">
            <h5 class="card-title">Docentes</h5>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-text" for="input_busqueda">Buscar por nombre</label>
                    <form class="form-inline" method="GET" action="{{ route('centrocomputo') }}">
                        <div id="input_busqueda" class="form-group">
                            <input  class="form-control px-2 mr-sm-2" name="nombre" type="search" placeholder="Ej. Luis Moreno" aria-label="Search">
                            <button class="btn btn-outline-primary " type="submit">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <table class="table table-hover" id="tabla_users">
                    <thead class="">
                    <tr>
                        <th with="10px">ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody id="body_users">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-7">
            <h5 class="card-title text-success">Registrar préstamo</h5>
            <label><strong>Docente: </strong><em>{{auth()->user()->name}}</em></label>
            <div class="row">
                <table class="table table-hover" id="tabla_prestamo">
                    <thead class="">
                    <tr>
                        <th with="10px">ID</th>
                        <th>Equipo</th>
                        <th>Total</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody id="body_prestamo">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endcan

@endsection

@section('footer')
    <div class="container">
        <p class="m-0 text-center text-white">&copy; 2018 <strong>Instituto René Descartes.</strong> Todos los derechos reservados</p>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        //Obtiene el select de categorias
        var select_categoria = $("#select_categoria");
        var select_tipo = $("#select_tipo");

        var options_tipo = $(".tipo_option");

        //Si se selecciona una categoria trae agrega los tipos disponibles
        //y los agrega al option Tipo
        select_categoria.change(function (event) {
            //Evita que se recargue la pagina
            event.preventDefault();

            //Guardo el id de la categoria seleccionada (propiedad value)
            var categoria_seleccionada = $(this).children("option:selected").val();

            //Cargo los tipos por ajax
            $.ajax({
                type: 'GET',
                url: '/categorias/'+categoria_seleccionada,
                success: function (response) {

                    options_tipo = $(".tipo_option");
                    options_tipo.remove();

                    //Si hay tipos en el response, agrega los tipos al select de tipos
                    if(Object.keys(response).length > 0 ){

                        //Desbloqueo el select de tipos
                        select_tipo.prop('disabled', false);

                        //Agrego los option al select de tipos
                        response.forEach(function(value, index){
                            select_tipo.append(
                                '<option class="form-control tipo_option" value="'+value.id+'">' +value.tipo+'</option>'
                            );
                        });

                    }else{
                        //Si no hay tipos en el response solo filtramos equipos por Categoria

                        //Desactivamos el select de tipos
                        select_tipo.prop('disabled', true);
                        select_tipo.append('<option class="form-control tipo_option" value="N/A"> N/A </option>');

                        //Mandamos un tipo nulo, para evitar filtrar por tipo
                        var tipo_seleccionado = null;

                        $.ajax({
                            type: 'GET',
                            url: 'inventarios/'+categoria_seleccionada+'/'+tipo_seleccionado,
                            success: function (response) {
                                crear_tabla_inventario();
                                llenar_body(response);
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    }

                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        //Si se selecciona un tipo trae los dispositivos por categoria y por tipo
        //y los agrega a la tabla de inventario
        select_tipo.change(function (event) {

            //Guardo el id del tipo y categoria seleccionados
            var tipo_seleccionado = $(this).children("option:selected").val();
            var categoria_seleccionada = $("#select_categoria").children("option:selected").val();

            $.ajax({
                type: 'GET',
                url: 'inventarios/' + categoria_seleccionada + '/' + tipo_seleccionado,
                success: function (response) {
                    console.log(response);
                    crear_tabla_inventario();
                    llenar_body(response);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });

    function crear_tabla_inventario() {

        var tabla_inventario_content = $("#tabla_inventario_content");
        var tabla_inventario = $("#tabla_inventario");

        //Borro el body de la tabla anterior
        tabla_inventario.remove();

        //Crea la tabla inventario
        tabla_inventario_content.append(
            '<table class="table table-hover" id="tabla_inventario">'+
                '<thead class="">'+
                    '<tr>'+
                    '<th with="10px">ID</th>'+
                    '<th>Nombre</th>'+
                    '<th>Num serie</th>'+
                    '<th>Modelo</th>'+
                    '<th>Descripcion</th>'+
                    '<th>Clave</th>'+
                    '<th colspan="3">&nbsp;</th>'+
                    '</tr>'+
                '</thead>'+
                '<tbody id="body_inventario">'+
                '</tbody>'+
            '</table>');
    }

        //Llena el body de la tabla inventario, con los dispostivos recibidos
    function llenar_body(datos) {
        //Agrego los dispositivos
        datos.forEach(function(value, index){
            $("#body_inventario").append(
                '<tr><td>'
                + value.id + '</td><td>'
                + value.nombre + '</td><td>'
                + value.num_serie + '</td><td>'
                + value.modelo +'</td><td>'
                + value.descripcion + '</td><td>'
                + value.clave+ '</td><td>'
                + '<button class="btn btn-sm btn-primary">Seleccionar</button>' + '</td></tr>'
            );
        });
    }

</script>
@endsection
