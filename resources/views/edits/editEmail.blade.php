@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Actualizar correo electrónico</div>
                     @include('partials.emailinvalido')
                 
                  
    
                <div class="panel-body">
                
               
                <form class="form-horizontal" role="form" method="POST" action="/usersControl/{{ Auth::user()->id}}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
 
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Ingrese nuevo correo electrónico</label>
 
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required="true">
 
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                             <div class="form-group{{ $errors->has('Cemail') ? ' has-error' : '' }}">
                            
                            <label for="Cemail" class="col-md-4 control-label">Confirme nuevo correo electrónico</label>
 
                                <div class="col-md-6">
                                    <input id="Cemail" type="email" class="form-control" name="Cemail" required="true">
 
                                    @if ($errors->has('Cemail'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('Cemail') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                         <input type="text" name="identifier" hidden="true" value="2">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary form-control">Actualizar</button>
                        </div>
                        </div>
                </form>
                </div>
 
            </div>
        </div>
    </div>
</div>
@endsection
 