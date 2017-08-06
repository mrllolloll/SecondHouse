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

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" maxlength="50" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Apellido</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" maxlength="50" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('n_id') ? ' has-error' : '' }}">
                           
                            <label for="t_id" class="col-md-4 control-label">Tipo ID</label>
                            
                            <div class="col-md-2">
                                <select class="form-control" name="t_id">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>


                            <label for="n_id" class="col-md-2 control-label">Número ID</label>

                            <div class="col-md-4">
                                <input id="n_id" type="number" class="form-control" name="n_id" value="{{ old('n_id') }}"  required autofocus>

                                @if ($errors->has('n_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('n_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                           
                            <label for="gender" class="col-md-4 control-label">Género</label>
                            
                            <div class="col-md-4">
                                <select class="form-control" name="gender">
                                    <option value="1">M</option>
                                    <option value="2">F</option>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('DOB') ? ' has-error' : '' }}">
                            <label for="DOB" class="col-md-4 control-label">Fecha de nacimiento</label>

                            <div class="col-md-6">
                                <input id="DOB" type="date" class="form-control" name="DOB" value="{{ old('DOB') }}" 
                                max="<?php echo date('Y-m-d', strtotime( date("Y-m-d", strtotime(date('Y-m-d'))).' - 18 Years')); ?>" min="<?php echo date('Y-m-d', strtotime( date("Y-m-d", strtotime(date('Y-m-d'))).' - 100 Years')); ?>" required>

                                @if ($errors->has('DOB'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('DOB') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cellphone') ? ' has-error' : '' }}">
                            <label for="cellphone" class="col-md-4 control-label">Celular</label>

                            <div class="col-md-6">
                                <input id="cellphone" type="number" class="form-control" name="cellphone" value="{{ old('cellphone') }}"  required>

                                @if ($errors->has('cellphone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cellphone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('id_city') ? ' has-error' : '' }}">
                           
                            <label for="id_city" class="col-md-4 control-label">Ciudad</label>
                            
                            <div class="col-md-4">
                                <select class="form-control" name="id_city" required="true">
                                    <option >Ciudad</option>    
                                    @foreach($cities as $c)
                                    <option value="{{ $c->id }}">{{ ucfirst($c->city) }}</option>    
                                    @endforeach                                
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Direccion</label>

                            <div class="col-md-6">
                                <textarea name="address" class="form-control" required maxlength="500"></textarea>
                               


                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" maxlength="255" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email_confirmation') ? ' has-error' : '' }}">
                            <label for="email_confirmation" class="col-md-4 control-label">Confirmar Correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email-confirmation" type="email_confirmation" class="form-control" name="email_confirmation" value="{{ old('email_confirmation') }}" maxlength="255" required>

                                @if ($errors->has('email_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


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
                                <button type="submit" class="btn btn-primary">
                                    Continuar
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
