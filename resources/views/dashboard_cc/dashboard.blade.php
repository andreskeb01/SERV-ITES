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
            <!--boton administrar para acceder al inventario-->
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
                    <label class="form-text" for="input_busqueda_equipos">Buscar por nombre</label>
                    <form id="form_buscar_equipos" class="form-inline" method="GET" action="{{ route('centrocomputo') }}">
                        <div id="input_busqueda_equipos" class="form-group">
                            <input  class="form-control px-2 mr-sm-2" name="nombre_equipo" type="search" placeholder="Ej. HP, Mac, etc" aria-label="Search">
                            <button class="btn btn-outline-primary " type="submit">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row" style="padding-right: 30px">
                <div id="tabla_inventario_content">

                </div>
            </div>
        </div>
        <div class="form-group col-5">
            <h5 class="card-title">Docentes</h5>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-text" for="input_busqueda_docentes">Buscar por nombre</label>
                    <form id="form_buscar_docente" class="form-inline" method="GET" action="{{ route('centrocomputo') }}">
                        <div id="input_busqueda_docentes" class="form-busquedagroup">
                            <input  class="form-control px-2 mr-sm-2" name="input_nombre_docente" type="search" placeholder="Ej. Luis Moreno" aria-label="Search">
                            <button class="btn btn-outline-primary " type="submit">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div id="tabla_docentes_content">

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-7">
            <h5 class="card-title text-success">Registrar préstamo</h5>
            <label><strong>Docente: </strong><em id="label_responsable"></em></label>
            <div class="input-group input-group-sm mb-1 pr-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">Hora entrada</span>
                </div>
                <input class="form-control px-2 mr-sm-2" name="input_hora_entrada" type="search" placeholder="Seleccionar hora" aria-label="Search">
            </div>

            <div class="row col-12">
                <table class="table table-hover" id="tabla_registro_prestamo">
                    <thead class="">
                    <tr>
                        <th with="10px">ID</th>
                        <th>Equipo</th>
                        <th>Total</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody id="body_registro_prestamo">

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
                                llenar_body_tabla_inventario(response);
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
                    crear_tabla_inventario();
                    llenar_body_tabla_inventario(response);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        $("#form_buscar_docente").submit(function (event) {
            event.preventDefault();

            var nombre_docente = $('input[name="input_nombre_docente"]').val();
            //Si el nombre es diferente a una cadena vacia, enviamos un caracter
            //para completar la url y exista al menos un nombre
            if(!nombre_docente.trim()){
               nombre_docente = "+";
            }

            $.ajax({
                type: 'GET',
                url: 'docentes/'+nombre_docente,
                success: function (response) {
                    crear_tabla_docentes();
                    llenar_body_tabla_docentes(response);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        $("#form_buscar_equipos").submit(function (event) {
            event.preventDefault();

            var nombre_equipo = $('input[name="nombre_equipo"]').val();
            //Si el nombre es diferente a una cadena vacia, enviamos un caracter
            //para completar la url y exista al menos un nombre
            if(!nombre_equipo.trim()){
                nombre_equipo = "+";
            }

            $.ajax({
                type: 'GET',
                url: 'dispositivos/'+nombre_equipo,
                success: function (response) {
                    crear_tabla_inventario();
                    llenar_body_tabla_inventario(response);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });


    });


    function crear_tabla_docentes() {

        var tabla_docentes_content = $("#tabla_docentes_content");
        var tabla_docentes = $("#tabla_docentes");

        //Borro el body de la tabla anterior
        tabla_docentes.remove();

        //Crea la tabla inventario
        tabla_docentes_content.append(
        '<div class="row" style="padding-right: 30px">'+
            '<table class="table table-hover" id="tabla_docentes">'+
            '<thead class="">'+
                '<tr>'+
                    '<th with="10px">ID</th>'+
                    '<th>Nombre</th>'+
                    '<th>Email</th>'+
                    '<th colspan="3">&nbsp;</th>'+
                '</tr>'+
            '</thead>'+
            '<tbody id="body_tabla_docentes">'+
            '</tbody>'+
            '</table>'+
        '</div>'
        );
    }

    function llenar_body_tabla_docentes(datos) {
        //Agrego los docentes

        var body_docentes = $("#body_tabla_docentes");

        datos.forEach(function(value, index){
            body_docentes.append(
                '<tr><td value="id">'
                + value.id + '</td><td value="name">'
                + value.name + '</td><td value="email">'
                + value.email + '</td><td>'
                + '<button type="button" class="btn btn-success btn-sm">Agregar</button>' + '</td></tr>'
            );
        });
        //Agregamos el evento para encontrar la fila de dispositivos seleccionados
        body_docentes.find(".btn-success").click(function () {
            var usuario_seleccionado = [];

            $(this).parents("tr").find("td").each(function (index, value) {
                if(index < 3){
                    usuario_seleccionado[$(this).attr("value")] = $(this).html();
                }
            });

            $("#label_responsable").text(usuario_seleccionado.name);
        });

    }

    function crear_tabla_inventario() {

        var tabla_inventario_content = $("#tabla_inventario_content");
        var tabla_inventario = $("#tabla_inventario");

        //Borro la tabla de inventario anterior
        tabla_inventario.remove();

        //Crea la tabla inventario
        tabla_inventario_content.append(
        '<div class="row" style="padding-right: 30px">'+
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
            '</table>'+
        '</div>');

    }

        //Llena el body de la tabla inventario, con los dispostivos recibidos
    function llenar_body_tabla_inventario(datos) {
        //Agrego los dispositivos

        var body_inventario = $("#body_inventario");

        datos.forEach(function(value, index){
            body_inventario.append(
                '<tr><td value="id">'
                + value.id + '</td><td value="nombre">'
                + value.nombre + '</td><td value="num_serie">'
                + value.num_serie + '</td><td value="modelo">'
                + value.modelo +'</td><td value="descripcion">'
                + value.descripcion + '</td><td value="clave">'
                + value.clave+ '</td><td>'
                + '<button type="button" class="btn btn-success btn-sm">Agregar</button>' + '</td></tr>'
            );
        });

        //Agregamos el evento para encontrar la fila de dispositivos seleccionados
        body_inventario.find(".btn-success").click(function () {

            var dispositivo_seleccionado = [];

            $(this).parents("tr").find("td").each(function (index, value) {
                if(index < 6){
                    dispositivo_seleccionado[$(this).attr("value")] = $(this).html();
                }else return false;
            });

            $("#body_registro_prestamo").append(
                '<tr><td value="id">'
                + dispositivo_seleccionado.id +'</td><td value="descripcion">'
                + dispositivo_seleccionado.modelo + '</td></tr>'
            );
            console.log(dispositivo_seleccionado);
        });
    }

</script>
@endsection
