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
            <div class="col-lg-10 col-md-offset-2">
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
                            <div class="tab-content" style="padding-left: 25px">
                                <div role="tabpanel" class="tab-pane fade show active" id="´1´_cuatrimestre">
                                    <div class="d-flex">
                                        <ul class="nav nav-pills flex-column" role="tablist">
                                          <li class="nav-item">
                                            <a class="nav-link" href="#´1´_materia" role="tab" data-toggle="tab">
                                             @foreach($licenciatura->materias as $materia)
                                                   @if($materia->cuatrimestre==1)
                                                    {{$materia->nombre}}
                                                    @endif
                                             @endforeach
                                             </a>
                                          </li>
                                        </ul>
                                    </div>

                                </div>
                                @for($i = 2; $i<=$licenciatura->cuatrimestres; $i++)
                                    <div role="tabpanel" class="tab-pane fade in active" id="´{{$i}}´_cuatrimestre">
                                        <div class="d-flex">
                                            <ul class="nav nav-pills flex-column" role="tablist">
                                                @php
                                                $m=1;
                                                @endphp
                                               @foreach($licenciatura->materias as $materia)
                                                @if($materia->cuatrimestre==$i)
                                                <li class="nav-item">
                                                        <a class="nav-link" href="#´{{$m}}´_materia" role="tab" data-toggle="tab"> {{$materia->nombre}}</a>
                                                    </li>
                                                @endif
                                                   @php
                                                   $m++;
                                                   @endphp
                                                @endforeach
                                            </ul>
                                            <div class="tab-content" style="padding-left: 15px">
                                              <div role="tabpanel" class="tab-pane fade" id="´1´_materia">
                                                  @foreach($licenciatura->materias as $materia)
                                                      @if( $materia->cuatrimestre==1)
                                                          @foreach($materia->libros as $libro)
                                                          {{$libro->titulo}}
                                                          @endforeach
                                                          @break
                                                      @endif
                                                  @endforeach
                                              </div>

                                                @php
                                                    $m2=1;
                                                @endphp
                                                @foreach($licenciatura->materias as $materia)
                                                    @if($materia->cuatrimestre==$i)
                                                        <div role="tabpanel" class="tab-pane fade" id="´{{$m2}}´_materia">
                                                            @foreach($materia->libros as $libro)
                                                                {{$libro->titulo}} <br>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    @php
                                                    $m2++;
                                                    @endphp
                                                @endforeach
                                            </div>
                                        </div>
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

@section('script')
    <script type="text/javascript">
        $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            var $subMenu = $(this).next(".dropdown-menu");
            $subMenu.toggleClass('show');


            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                $('.dropdown-submenu .show').removeClass("show");
            });


            return false;
        });
    </script>
@endsection

