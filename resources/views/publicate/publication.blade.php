@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="container">
                        <div class="row">

                        <div class="row">
                            <div class="col-md-12">
                            <table>
                                <tr>
                                <h2>{{ $user->first_name }} {{ $user->last_name }} </h2>
                            @foreach($files as $f)
                                <td>
                                <img src="/imgfiles/{{ $f->url_file }}" style="width: 25%; height: 25%">
                                 @if(Auth::user()->id == $user->id)
                                 <form action="/publications/{{ $f->id }}"  method="POST">
                                {{ method_field('DELETE') }}
                                 {{ csrf_field() }}

                                  <input type="text" hidden="true" name="idUser" value="{{ $user->id }}">
                                  <input type="submit" name="deletePicture" value="Borrar imagen" class="btn btn-danger">
                                </form>
                                @endif
                                </td>
                            @endforeach
                                </tr>
                            </table>
                            </div>
                        </div>

                        <div class="col-md-12">
                        <div class="row"><b><h3>{{ $publications->title }}</h3></b></div>
                        <div class="row"><p>{{ $publications->description }}</p></div>
                        </div>

                        <div class="row">

                            <div class="col-sm-12 col-md-6">
                                <form class="form-group" method="post" action="/comments">
                                    {{ csrf_field() }}
                                    <div>
                                    <div class="col-md-3">
                                    <select name="calification" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    </div>
                                    <div>
                                    <textarea name="comment" class="col-md-12 form-control"></textarea>
                                    <input type="text" value="{{ Auth::user()->id }}" hidden="true" name="id_user">
                                    <input type="text" value="{{ $publications->id }}" hidden="true" name="id_publication">
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Comentar</button>
                                    </div>
                                    </div>
                                <table>
                                </form>
                                Puntuación de los usuarios: {{ $califications }}
                                @foreach($comments as $c)
                                    <tr>
                                    @if($publications->id_user == Auth::user()->id || $c->show == 1)
                                    {{ $c->comment }}<br>Puntaje {{ $c->calification }}
                                    @if( $c->id_user == Auth::user()->id || $publications->id_user == Auth::user()->id)

                                    @if($c->show == 1)
                                    <form action="/comments/{{ $c->id }}"  method="POST">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}

                                      <input type="text" hidden="true" name="idSend" value="{{ Auth::user()->id }}">
                                      <input type="text" hidden="true" name="idUser" value="{{ $user->id }}">
                                      <input type="submit" name="deleteComment" value="Ocultar comentario" class="btn btn-danger">
                                    </form>
                                    @else
                                        <br>Oculto <br>
                                    @endif
                                    @endif
                                    @endif
                                    </tr>
                                @endforeach
                                </table>
                            </div>


                            <div class="col-sm-12 col-md-6">
                            <section class="pull-right">

                                <form action="/reservation" method="post" class="form-group">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Fecha inicio</label>
                                    <div class="col-sm-3">
                                      <input type="date" class="form-control" name="beginDate" id="inputPassword">
                                    </div>
                                    <label class="col-sm-1 col-form-label">Fecha fin</label>
                                    <div class="col-sm-3">
                                      <input type="date" class="form-control" name="endDate" id="inputPassword">
                                    </div>
                                  </div>

                                <div class="form-group row">
                                    <label  class="col-sm-2 col-form-label">Tipo de mascota</label>
                                    <div class="col-sm-4">
                                      <select class="form-control" name="pet">
                                          @foreach($tpets1 as $t1)
                                            @foreach($pets as $p)
                                                @if($p->id_pet == $t1->id)
                                                    <option value="{{ $t1->id }}">{{ $t1->type }}</option>
                                                @endif
                                            @endforeach
                                          @endforeach
                                      </select>
                                    </div>
                                </div>
                                <input type="text" value="{{ $user->id }}" name="host_id" hidden="true">
                                <input type="text" value="{{ $publication_id }}" name="id" hidden="true">
                                <input type="submit" class="btn btn-primary" value="Reservar">
                                </form>
                            </section>
                            </div>
                        </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
