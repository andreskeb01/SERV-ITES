@extends('layouts.auth-layout')

@section('content')

    <br>
    <br>
    <br>
    <br>
        <div class= "row justify-content-md-center">
        <div clas="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <h1 class="panel-title">Acceso a computo </h1>

                </div>
                <div class="panel-body">

                    <form method="post" action="{{ route( 'login_autenticar') }}">

                        {{csrf_field()}}

                        <div class="form-group" {{$errors->has('usuario_invalido') ? 'has-error' : ''}}>
                            @if($errors->first('usuario_invalido'))
                                <span class='help-block' style= 'color: red;' >{{__('auth.auth_error')}} </span>
                            @endif
                        </div>

                        <div class="form-group" {{$errors->has('email') ? 'has-error' : ''}}>
                            <!--EMAIL BARRA.**********************************************************************-->
                            <label for="email">Email</label>
                            <input class="form-control"
                                type="email"
                                name="email"
                                   value="{{old('email')}}"
                                placeholder="ingresa email">
                            @if($errors->first('email'))
                                <span class='help-block' style= 'color: red;' >{{__('auth.email_error')}} </span>
                                @endif
                        </div>
                            <input class="form-control"
                                   type="password"
                                   name="password"
                                   placeholder="ingresa contraseña">
                            @if($errors->first('password'))
                                <span class='help-block' style= 'color: red;' >{{__('auth.password_error')}} </span>
                            @endif
                        </div>
                <br>
                        <div class="form-group ">
                            <button class="btn btn-primary btn-block "> Acceder </button>

                        </
                 div>

                <a href="login-cc.blade.php" align="center">
                    ¿olvidaste tu cuenta?
                </a>

                <a align="rigth" href="login-cc.blade.php" >
                    Crear Cuenta
                </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
