@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="container">
                        <div class="row">



                            @if($user->url_user==NULL || $user->url_user=='NULL')
                                <img src="/imgusers/user.png" class="">
                            @else
                                <img src="/imgusers/{{ $user->url_user }}" class="img img-responsive" style="width: 20%; height: 20%">
                            @endif

                            @if(Auth::user()->id != $user->id)
                            <form  method="POST" action="/chat" class="form-group">
                                {{ csrf_field() }}
                                <input type="text" hidden="true" value="{{ $user->id }}" name="idR">
                                <input type="text" hidden="true" value="{{ Auth::user()->id }}" name="idS">
                                <input type="submit" name="chat" value="Enviar mensaje" >
                            </form>

                            @endif
                            @if(Auth::user()->id == $user->id)
                            <form  method="POST" action="/chats" class="form-group">
                                {{ csrf_field() }}

                                <input type="text" hidden="true" value="{{ Auth::user()->id }}" name="idS">
                                <input type="submit" name="chat" value="Mensajes">
                            </form>
                            @endif

                              <h2>{{ ucfirst($user->first_name)}} {{ ucfirst($user->last_name)}}</h2>

                                <table>
                                    <tr>
                                       @if(Auth::user()->level == 3)
                                       @if($user->verified==0)
                                        El usuario no ha confirmado su correo electrónico
                                        @else
                                        @if($user->status==1 )
                                            <tr>
                                            <td>
                                             <button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modalVerify">Verificar</button>
                                             </td>
                                        </tr>

                                        @elseif($user->status==2 )
                                         <tr>
                                            <td>
                                            Verificado

                                            </td>
                                            <td><button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#modalBan">Ban</button></td>
                                            @if($user->level==2)
                                                <td><button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modalMadmin">Hacer administrador</button></td>
                                            @elseif($user->level==3)
                                                <td><button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#modalQadmin">Quitar administrador</button></td>
                                            @endif
                                        </tr>
                                        @endif
                                    @endif
                                @endif
                                        <td>
                                            @if($user->id == Auth::user()->id)
                                                @if($user->url_user!=NULL || $user->url_user!='NULL')
                                                   <form action="/usersControl/{{ $user->id }}" method="POST">
                                                        {{ method_field('PUT') }}
                                                        {{ csrf_field() }}

                                                        <input type="submit" name="deletePC" value="Eliminar foto de perfil" class="btn btn-danger btn-sm">
                                                    </form>

                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                         <td>
                                            @if($user->id == Auth::user()->id)

                                    <a href="{{ url('/editProfile') }}" class="btn btn-default">Editar perfil</a>
                                             @endif
                                        </td>
                                    </tr>

                                </table>

                        </div>

                        <div class="row">
                                 <table class="table">
                                    <tr><th>Correo electrónico</th><td>{{$user->email}} </td></tr>
                                    <tr><th>Teléfono celular</th><td>{{$user->cellphone}}</td></tr>
                                    <tr><th>Ciudad</th><td>
                                        @foreach($cities as $c)
                                            @if( $c->id == $user->id_city)
                                            {{ ucfirst($c->city) }}
                                            @endif
                                        @endforeach
                                    </td></tr>
                                    <tr><th>Direccion</th><td>{{$user->address}}</td></tr>
                                </table>

                        </div>
                    </div>

                    <hr>

                    <!-- Anuncio BOTONES -->

                    <div class="container">
                        <div class="row">
                        <h2>Anuncio</h2>
                        @if($user->id == Auth::user()->id)
                                @if($user->publication == 0)
                                    <form action="/publications/create" method="GET">
                                        <input type="text" name="$id" hidden="true" value="{{ Auth::user()->id }}">
                                        <input type="submit" name="createPublic"  class="btn btn-default" value="Publicar anuncio">

                                    </form>
                                @else
                                <table>
                                    <tr><td>
                                        <form action="/publications/{ $user->id }/edit" method="GET">
                                            <input type="text" name="idUser" hidden="true" value="{{ Auth::user()->id }}">
                                            <input type="submit" name="editar"  class="btn btn-default" value="Editar anuncio">
                                        </form>
                                        </td>
                                        <td>
                                        <form action="/publications/create" method="GET">
                                           <input type="submit" name="filesUP"  class="btn btn-default" value="Subir imágenes">
                                        </form>
                                        </td>
                                        <td>
                                        <form action="/publications/{{ $publication->id }}" method="get">
                                            {{ csrf_field() }}
                                            <input type="text" hidden="true" name="idUser" value="{{ Auth::user()->id }}">
                                            <input type="submit" name="Publication" value="Ver anuncio" class="btn btn-default">
                                        </form>
                                        </td>
                                    </tr>
                                </table>
                                @endif

                            @endif
                        @if($user->publication == 1)


                           @if($user->id == Auth::user()->id && $publication->verified == 0)
                                Verificación pendiente
                            @endif



                         <!-- Anuncio  INFORMACIÓN -->
                        @if($user->id != Auth::user()->id && $publication->verified == 0 || $publication->show == 0)
                            El usuario no tiene anuncio
                        @else
                       <br> <img src="/imgfiles/{{ $publication->url_file }}" style="width: 25%; height: 25%" class="img img-responsive">
                            <table class="table col-md-7 col-md-offset-1">

                               <tr><td><b>Título</b></td><td>{{ $publication->title }}</td></tr>
                               <tr><td><b>Descripción</b></td><td>{{ $publication->description }}</td></tr>

                               <tr><td><b>Tipo de casa</b></td><td>{{ $publication->title }}</td></tr>

                               <tr>
                                    <td><b>Tipo de mascotas a cuidar</b></td>
                                    <td>
                                        @foreach($pets as $p)
                                            @foreach($tpets as $tp)
                                                @if($p->id_pet == $tp->id)
                                                    <ul>
                                                        <li>{{ $tp->type }}</li>
                                                    </ul>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </td>
                                </tr>

                               <tr><td><b>Precio</b></td><td>{{ $publication->price }} Pesos</td></tr>
                               <tr>
                                    <td><b>Imágenes</b></td>

                                        @foreach($files as $f)
                                          <td>
                                            <img src="/imgfiles/{{ $f->url_file }}" class="img-responsive" style="width: 25%; height: 25%">
                                            <br>
                                            @if($user->id == Auth::user()->id)
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

                        @endif



                        @elseif($user->publication == 2)
                            <!-- Anuncio  INFORMACIÓN -->
                        @if($user->id != Auth::user()->id && $publication->verified == 1 || $publication->show == 0)

                            <form action="/publications/{{ $publication->id }}" method="get">

                                {{ csrf_field() }}
                                <input type="text" hidden="true" name="idUser" value="{{ $publication->id_user }}">
                                <input type="submit" name="Publication" value="Ver anuncio" class="btn btn-default">

                            </form>

                             <br> <img src="/imgfiles/{{ $publication->url_file }}" style="width: 25%; height: 25%" class="img img-responsive">
                            <table class="table col-md-7 col-md-offset-1">


                               <tr><td><b>Título</b></td><td>{{ $publication->title }}</td></tr>
                               <tr><td><b>Descripción</b></td><td>{{ $publication->description }}</td></tr>

                               <tr><td><b>Tipo de casa</b></td><td>{{ $publication->title }}</td></tr>

                               <tr>
                                    <td><b>Tipo de mascotas a cuidar</b></td>
                                    <td>
                                        @foreach($pets as $p)
                                            @foreach($tpets as $tp)
                                                @if($p->id_pet == $tp->id)
                                                    <ul>
                                                        <li>{{ $tp->type }}</li>
                                                    </ul>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </td>
                                </tr>

                               <tr><td><b>Precio</b></td><td>{{ $publication->price }} Pesos</td></tr>
                               <tr>
                                    <td><b>Imágenes</b></td>

                                        @foreach($files as $f)
                                          <td>
                                            <img src="/imgfiles/{{ $f->url_file }}" class="img-responsive" style="width: 25%; height: 25%">
                                            <br>
                                            @if($user->id == Auth::user()->id)
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
                        @else
                       <br> <img src="/imgfiles/{{ $publication->url_file }}" style="width: 25%; height: 25%" class="img img-responsive">
                            <table class="table col-md-7 col-md-offset-1">

                               <tr><td><b>Título</b></td><td>{{ $publication->title }}</td></tr>
                               <tr><td><b>Descripción</b></td><td>{{ $publication->description }}</td></tr>

                               <tr><td><b>Tipo de casa</b></td><td>{{ $publication->title }}</td></tr>

                               <tr>
                                    <td><b>Tipo de mascotas a cuidar</b></td>
                                    <td>
                                        @foreach($pets as $p)
                                            @foreach($tpets as $tp)
                                                @if($p->id_pet == $tp->id)
                                                    <ul>
                                                        <li>{{ $tp->type }}</li>
                                                    </ul>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </td>
                                </tr>

                               <tr><td><b>Precio</b></td><td>{{ $publication->price }} Pesos</td></tr>
                               <tr>




                                </tr>

                            </table>

                        @endif
                        @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Trigger the modal with a button -->


<!-- Modal verificar-->
<div id="modalVerify" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Atención</h4>
      </div>
      <div class="modal-body">
        <p>¿Seguro de querer verificar al usuario {{ $user->first_name }}  {{ $user->last_name }}?</p><br>
        <table>
            <tr>
                <td>
                   <form method="get" action="/usersAdmControl/{usersAdmControl}/edit">
                   <input type="text" name="id" hidden="true"  value="{{ $user->id }}">
                    <button class="btn btn-warning btn-sm" style="color: #FFFFFF; font-weight: bold">Verificar</button>
                    </form>
                    </form>
                </td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal Ban -->
<div id="modalBan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Atención</h4>
      </div>
      <div class="modal-body">
        <p>¿Seguro de querer banear al usuario {{ $user->first_name }}  {{ $user->last_name }}?</p><br>

        <table>
            <tr>
                <td>
                    <form method="post" class="form-inline" action="/usersAdmControl/{{ $user->id }}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <input type="submit" class="btn btn-danger" name="Ban" value="Ban">
                    </form>
                </td>
            </tr>
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal Madmin -->
<div id="modalMadmin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Atención</h4>
      </div>
      <div class="modal-body">
        <p>¿Seguro de querer dar derechos de administrador al usuario {{ $user->first_name }}  {{ $user->last_name }}?</p><br>

        <table>
            <tr>
                <td>
                     <form method="post" class="form-inline" action="/usersAdmControl/{{ $user->id }}">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                      <input type="submit" class="btn btn-success" name="MAdmin" value="Hacer administrador">

                    </form>
                </td>
            </tr>
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal Qadmin -->
<div id="modalQadmin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Atención</h4>
      </div>
      <div class="modal-body">
        <p>¿Seguro de querer dar derechos de administrador al usuario {{ $user->first_name }}  {{ $user->last_name }}?</p><br>

        <table>
            <tr>
                <td>
                    <form method="post" name="ban" class="form-inline" action="/usersAdmControl/{{ $user->id }}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}


                        <input type="submit" class="btn btn-danger" name="QAdmin" value="Quitar administrador">

                    </form>
                </td>
            </tr>
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>


@endsection
