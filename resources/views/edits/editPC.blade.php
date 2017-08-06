@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Subir foto de perfil</div>
                 @include('partials.emailinvalido')
                
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="/usersControl/{{ Auth::user()->id}}" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                        {{ csrf_field() }}

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
                         <input type="text" name="identifier" hidden="true" value="4">
                            <div class="col-md-6 col-md-offset-4">
                            <input type="submit" class="btn btn-info" value="Cargar"></button>
                                
                            </div>
                        </div>
@endsection

                    

      