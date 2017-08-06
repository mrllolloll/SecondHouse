@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cargar documento de identificación</div>
                
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="/usersControl/{{ Auth::user()->id}}" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('url_front') ? ' has-error' : '' }}">
                            <label for="url_front" class="col-md-4 control-label">Imagen frontal</label>

                            <div class="col-md-6">
                                <input id="url_front" type="file" class="form-control" name="url_front" value="{{ old('url_front') }}" maxlength="50" required="true" autofocus>

                                @if ($errors->has('url_front'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url_front') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('url_back') ? ' has-error' : '' }}">
                            <label for="url_back" class="col-md-4 control-label">Imagen posterior</label>

                            <div class="col-md-6">
                                <input id="url_back" type="file" class="form-control" name="url_back" value="{{ old('url_back') }}" maxlength="50" required="true" autofocus>

                                @if ($errors->has('url_back'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url_back') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <input type="text" name="identifier" hidden="true" value="5">
                            <div class="col-md-6 col-md-offset-4">
                            <input type="submit" class="btn btn-info" value="Cargar"></button>
                                
                            </div>
                        </div>
@endsection

                    
