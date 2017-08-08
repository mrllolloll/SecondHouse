@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro</div>
                @include('partials.flash')
                <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                 
                    <input id="first_name" value="{{ $first_name }}" hidden="true" type="text" name="first_name"  maxlength="50" >
                    <input id="last_name" value="{{ $last_name }}" type="text" hidden="true" name="last_name"  maxlength="50">
                    <input type="number" value="{{ $t_id }}" hidden="true" name="t_id">
                    <input type="number" value="{{ $n_id }}" hidden="true" name="n_id">
                    <input type="number" value="{{ $gender }}" hidden="true" name="gender">
                    <input id="DOB" type="date" name="DOB" value="{{ $DOB }}" hidden="true">
                    <input id="cellphone" type="number" name="cellphone" value="{{ $cellphone }}" hidden="true">
                    <input type="number" value="{{ $id_city }}" hidden="true" name="id_city">
                    <textarea name="address" hidden="true" required maxlength="500">{{ $address }}</textarea>
                    <input id="email" type="email" value="{{ $email }}" hidden="true" name="email" maxlength="255" >
                    <input id="password" type="password" value="{{ $password }}" name="password" hidden="true">

                    <div class="form-group{{ $errors->has('url_user') ? ' has-error' : '' }}">
                            <label for="url_user" class="col-md-4 control-label">Foto de perfil</label>

                        <div class="col-md-6">
                            <input id="url_user" type="file" class="form-control" name="url_user" value="{{ old('url_user') }}" maxlength="50" required="true" autofocus>

                            @if ($errors->has('url_user'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('url_user') }}</strong>
                                </span>
                            @endif
                        </div>
                        </div>
                        <h4>Para verificar su identidad es necesario que envíe una imagen de la parte frontal y posterior de su documento de identificación.  Este procedimiento es necesario para ser parte de la comunidad</h4>
                        <div class="form-group{{ $errors->has('url_front') ? ' has-error' : '' }}">
                            <label for="url_front" class="col-md-4 control-label">Foto frontal de documento</label>

                            <div class="col-md-6">
                                <input id="url_front" type="file" class="form-control" name="url_front" value="{{ old('url_front') }}" maxlength="50"  required="true" autofocus>

                                @if ($errors->has('url_front'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url_front') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('url_back') ? ' has-error' : '' }}">
                            <label for="url_back" class="col-md-4 control-label">Foto posterior de documento</label>

                            <div class="col-md-6">
                                <input id="url_back" type="file" class="form-control" name="url_back" value="{{ old('url_back') }}" maxlength="50" required="true" autofocus>

                                @if ($errors->has('url_back'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url_back') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                  <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="color: #FFFFFF; font-weight: bold">Continuar</button>
                            </div>
                        </div>

                        <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Confirme registro</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Al aceptar, confirma que está de acuerdo con nuestros <a href="#">Terminos y condiciones</a>.</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Acepto y deseo continuar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 

 