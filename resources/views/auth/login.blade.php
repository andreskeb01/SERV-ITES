@extends('layouts.auth-layout')

@section('content')
    <div class= "row">
        <div clas="col-md-3  ">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <h1 class="panel-title">Acceso a la Aplicacion </h1>

                </div>
                <div class="panel-body">

                    <form method="post" action="{{ route( 'login_autenticar') }}">

                        {{csrf_field()}}

                        <div class="form-group" {{$errors->has('email') ? 'has-error' : ''}}>
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
                        <div class="form-group" {{$errors->has('password') ? 'has-error' : ''}}>
                            <label for="password">Password</label>
                            <input class="form-control"
                                   type="password"
                                   name="password"
                                   placeholder="ingresa contraseña">
                            @if($errors->first('password'))
                                <span class='help-block' style= 'color: red;' >{{__('auth.password_error')}} </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary py-1 px-3"> Acceder </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
