@extends('layouts.app')
@section('titulo')
  Registrate
@endsection
@section('contenido')
<div class="container">
  <div class="row">
    <br><br>
  </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edite sus datos</div>
                <br>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="patch" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input name="name" type="text" class="form-control" id="name"  data-validation-required-message="Ingresa tu nombre" value="{{ old('name') }}">
                                <!-- error -->
                                <p id="err1" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>Por favor, ingrese su nombre</p>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Apellido</label>

                            <div class="col-md-6">
                                <input name="lastname" type="text" class="form-control" id="lastname"  data-validation-required-message="Ingresa tu Apellido" value="{{ old('lastname') }}">
                                <!-- error -->
                                <p id="err2" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>Por favor, ingrese su apellido</p>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                            <label for="tel" class="col-md-4 control-label">Teléfono</label>

                            <div class="col-md-6">
                                <input name="tel" type="text" class="form-control" id="tel"  data-validation-required-message="(011)-15-xxxxxxxx" value="{{ old('tel') }}">
                                <!-- error -->
                                <p id="err3" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>Por favor, ingrese su número de teléfono</p>

                                @if ($errors->has('tel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" data-validation-required-message="Ingresa tu email, tambien sera tu usuario" required>
                                 <!-- error -->
                                  <p id="err4" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>Por favor, ingrese su email</p>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" data-validation-required-message="Ingresa Password"required>
                                <!-- error -->
                                  <p id="err5" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>Por favor, ingrese una contraseña</p>


                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Repita la contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" data-validation-required-message="Repite Password" required>
                                <!-- error -->
                                <p id="err6" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>Por favor, ingrese una contraseña</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="background-color:#555555; border-radius:5px; color:white;">
                                   Registrarse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container -->



<!-- Contact Form JavaScript -->
<!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>
<script src="js/js.js"></script>


@endsection
