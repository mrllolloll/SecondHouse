@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar información del perfil</div>
                
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/usersControl/{{ Auth::user()->id}}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="first_name" value="{{ ucfirst(Auth::user()->first_name)}}" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" maxlength="50" required autofocus>

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
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ ucfirst(Auth::user()->last_name)}}" maxlength="50" required autofocus>

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
                                <input id="n_id" type="text" class="form-control" name="n_id" value="{{ ucfirst(Auth::user()->n_id)}}"  required autofocus>

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
                                <input id="DOB" type="date" class="form-control" name="DOB" value="{{ ucfirst(Auth::user()->DOB)}}" 
                                max="<?php echo date('Y-m-d', strtotime( date("Y-m-d", strtotime(date('Y-m-d'))).' - 18 Years')); ?>" required>

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
                                <input id="cellphone" type="text" class="form-control" name="cellphone" value="{{ ucfirst(Auth::user()->cellphone)}}"  required>

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
                                <textarea name="address" class="form-control"  required maxlength="500">{{ ucfirst(Auth::user()->address)}}</textarea>
                               


                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="text" name="identifier" hidden="true" value="1">
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
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
