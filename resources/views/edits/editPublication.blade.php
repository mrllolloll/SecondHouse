@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar anuncio</div>
                @include('partials.flash')
                <div class="panel-body">
                 @foreach($publication as $p)
                    @if($user->id == $p->id_user)
                    <form class="form-horizontal" role="form" method="POST" action="/publications/{{ $p->id }}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Título</label>

                           
                                    <div class="col-md-6">
                                    <input id="title" type="text" value="{{ $p->title }}" class="form-control" name="title" value="" maxlength="70" required autofocus>

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
                                <textarea class="form-control" name="description" maxlength="500">{{ $p->description }}</textarea>
                                
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
                                <input id="cost" type="number" class="form-control" name="cost" value="{{ $p->price }}"  required>

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
                                <b><u>Nota:</b> Seleccionar todos los tipos de mascota a cuidar</u> <br>
                                    @foreach($tpets as $t)
                                        <input type="checkbox" name="tpets[]" value="{{ $t->id }}">{{ $t->type }}
                                    @endforeach
                                                                 
                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                            <label for="file" class="col-md-4 control-label">Imagen principal de anuncio</label>

                        <div class="col-md-6">
                        <b><u>Nota:</b> Si no desea cambiar la imagen, deje el campo "Imagen principal" vacío</u> <br>
                            <input id="file" type="file" class="form-control" name="file" value="{{ old('file') }}" maxlength="50" autofocus>

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
                                <button type="submit" name="updateInfo" class="btn btn-primary">
                                    Continuar
                                </button>
                            </div>
                        </div>


                    </form>
                    @endif
                            @endforeach
                          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
