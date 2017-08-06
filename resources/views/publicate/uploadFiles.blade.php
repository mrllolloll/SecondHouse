@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cargar archivos</div>
                
             
                
                <div class="panel-body">    
                <h6><b><u>Nota:</u></b> Los archivos en caso de ser imágenes deben ser formato PNG, JPG o JPEG.</h6>
                <h6><b><u>Nota al cliente:</u></b> Si hay algún otro formato de archivo que desee incluir, por favor notifiquelo para expandir el sistema.</h6>

                    <form class="form-horizontal" role="form" method="POST" action="/publications" enctype="multipart/form-data">
                        
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                            <label for="file" class="col-md-4 control-label">Imagen</label>

                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control" name="file" value="{{ old('file') }}" maxlength="50" required="true" autofocus>

                                @if ($errors->has('file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <input type="text" name="idUser" hidden="true" value="{{ Auth::user()->id }}">
                            <div class="col-md-6 col-md-offset-4">
                            <input type="submit" name="upfiles" class="btn btn-info" value="Cargar"></button>
                                
                            </div>
                        </div>
@endsection

                    

      