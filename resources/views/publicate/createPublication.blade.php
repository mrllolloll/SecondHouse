@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Publicar anuncio</div>
                @include('partials.flash')
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/publications" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Título</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" maxlength="70" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Descripción</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="description" maxlength="500"></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('n_id') ? ' has-error' : '' }}">
                           
                            <label for="t_id" class="col-md-4 control-label">Tipo de casa</label>
                            
                            <div class="col-md-2">
                                
                            @foreach($houses as $h)
                                @if($h->id == 1)
                                    <input type="radio" name="house" value="{{ $h->id }}" checked="true" class="form-control radio">{{ $h->type }}
                                @else
                                     <input type="radio" name="house" value="{{ $h->id }}" class="form-control form-control-sm radio">{{ $h->type }}
                                @endif
                                
                            @endforeach
                                
                            </div>

                        </div>
                        
                        <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
                            <label for="cost" class="col-md-4 control-label">Costo</label>

                            <div class="col-md-6">
                                <input id="cost" type="number" class="form-control" name="cost" value="{{ old('cost') }}"  required>

                                @if ($errors->has('cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cost') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('tpets') ? ' has-error' : '' }}">
                           
                            <label for="tpets" class="col-md-4 control-label">Tipos de mascotas</label>
                            
                            <div class="col-md-4">
                               
                                    @foreach($tpets as $t)
                                        <input type="checkbox" name="tpets[]" value="{{ $t->id }}">{{ $t->type }}
                                    @endforeach
                                                                 
                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('url_user') ? ' has-error' : '' }}">
                            <label for="url_user" class="col-md-4 control-label">Imagen principal de anuncio</label>

                        <div class="col-md-6">
                            <input id="url_user" type="file" class="form-control" name="url_user" value="{{ old('url_user') }}" maxlength="50" required="true" autofocus>

                            @if ($errors->has('url_user'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('url_user') }}</strong>
                                </span>
                            @endif
                        </div>
                        </div>
                       

                        <input type="text" name="idUser" hidden="true" value="{{  Auth::user()->id }}">
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
