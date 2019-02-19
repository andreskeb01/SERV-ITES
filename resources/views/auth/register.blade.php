@extends('layouts.auth-layout')
@section('header')
    <div class="bg-dark row no-gutters slider-text js-fullheight align-items-center justify-content-center text-white" data-scrollax-parent="true">
        <div class="flex-row">
            <img src="/base-biblioteca/images/footer_ites.png" alt="">
            <label><h5><strong>"René Descartes"</strong></h5></label>
        </div>
    </div>
@endsection
@section('content')
<div class="">
    <br>
<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
    <h5><strong>Bienvenido, registrate para acceder a los servicios institucionales</strong></h5>
</div>
    <br>
<div class="row no-gutters slider-text js-fullheight  justify-content-center" data-scrollax-parent="true">
    <div class="col-md-5 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
        <div class="container border border-dark bg-light rounded" style="padding: 1rem;">
            <form method="POST" action="{{ route('register.create') }}">

                {{ csrf_field() }}
                <br>
                {!! $errors->first('register_failed','<span class="help-block" style="color: red;">:message</span>') !!}
                <div class="form-group form-inline {{ $errors->has('name') ? 'has-error' : '' }}">
                    <div class="col-md-3">
                        <label class="float-left" for="name">Nombre</label>
                    </div>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control col-md-9" placeholder="¿Cómo te llamas?                     " required autofocus>
                    @if($errors->first('name'))
                        <span class='help-block' style='color: red;'>{{__('auth.email_error')}}</span>
                    @endif
                </div>
                <div class="form-group form-inline {{ $errors->has('email') ? 'has-error' : '' }}">
                    <div class="col-md-3">
                        <label class="float-left" for="email">Email</label>
                    </div>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control col-md-9" placeholder="Registra tu email" required>
                    @if($errors->first('email'))
                        <span class='help-block' style='color: red;'>{{__('auth.email_error')}}</span>
                    @endif
                </div>
                <div class="form-group form-inline {{ $errors->has('password') ? 'has-error' : '' }}">
                    <div class="col-md-3">
                        <label class="float-left" for="password">Contraseña</label>
                    </div>
                    <input type="password" name="password" class="form-control col-md-9" placeholder="Ingresa tu contraseña" required>
                    @if($errors->first('password'))
                        <span class='help-block' style='color: red;'>{{__('auth.password_error')}}</span>
                    @endif
                </div>
                <div class="form-group form-inline {{ $errors->has('password') ? 'has-error' : '' }}">
                    <div class="col-md-3">
                        <label class="float-left" for="password_confirmation">Verificar contraseña</label>
                    </div>
                    <input type="password" name="password_confirmation" class="form-control col-md-9" placeholder="Confirma tu contraseña" required>
                    @if($errors->first('password'))
                        <span class='help-block' style='color: red;'>{{__('auth.password_confirm_error')}}</span>
                    @endif
                </div>
                <div class="form-group form-inline {{ $errors->has('password') ? 'has-error' : '' }}">
                    <div class="col-md-3">
                        <label class="float-left" for="select_rol-confirm">Tipo usuario</label>
                    </div>
                    <select class="form-control col-md-6" name="rol_usuario">
                        <option value="3" {{ (old("tipo_usuario") == 3 ? "selected":"") }}> Alumno </option>
                        <option value="5" {{ (old("tipo_usuario") == 5 ? "selected":"") }}>Docente</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="check_politicas">
                        <label class="form-check-label" for="check_politicas">Acepto las <a href="/ites/policies">politicas institucionales</a></label>
                    </div>
                </div>
                <br>
                <div class="form-group text-center">
                    <button class="btn btn-primary py-2 px-5">Registrarme</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <br>
    <br>
</div>
@endsection
@section('footer')
    <div class="container">
        <p class="m-0 text-center text-white">&copy; 2018 <strong>Instituto René Descartes.</strong> Todos los derechos reservados</p>
    </div>
@endsection
