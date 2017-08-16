@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Panel de administración</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="panel panel-default col-md-12">
                            <div class="panel-heading">
                                Usuarios del sitio  || {{ $users->total() }}

                                <form class="navbar-form pull-right" action="/usersAdmControl"  method="get" role="search" >
                                    <div class="input-group">
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Nombre...">

                                        <select class="form-control" name="administration">
                                          <option>Información a administrar</option>
                                          <option>**Por ahora inactiva**</option>
                                          <option>Usuarios</option>
                                          <option>Anuncios</option>
                                        </select>



                                        <select class="form-control" name="level">
                                          <option>Nivel</option>
                                          <option value="3">Administrador</option>
                                          <option value="2">Activo</option>
                                          <option value="1">Inactivo</option>
                                        </select>

                                        <select class="form-control" name="verified">
                                          <option>Verificación Correo</option>
                                          <option value="0">No verificado</option>
                                          <option value="1">Verificado</option>
                                        </select>

                                        <select class="form-control" name="gender">
                                          <option>Género</option>
                                          <option value="1">Masculino</option>
                                          <option value="2">Femenino</option>
                                        </select>

                                        <select class="form-control" name="status">
                                          <option>Verificación ID</option>
                                          <option value="1">No verificado</option>
                                          <option value="2">Verificado</option>
                                        </select>
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-primary">
                                                Buscar
                                                    <span class="sr-only">Buscar</span>
                                                </span>
                                            </button>
                                        </span>
                                        </div>
                                    </div>
                                </form>

                                <div class="panel-body">
                               <table class="table table-striped">
                                 <tr>
                                    <th>Nombre y Apellido</th>
                                    <th>Estado correo electrónico</th>
                                    <th>Estado de verificación de ID</th>
                                    <th>Nivel</th>

                                    <th>Miembro desde</th>
                                    <th>Opciones</th>
                                </tr>

                                @foreach($users as $u)
                                <tr>
                                    <td><b><a href="/usersControl/{{ $u->id }}">{{ ucfirst($u->first_name) }}  {{ ucfirst($u->last_name) }}</a></b></td>
                                    <td>
                                         @if($u->verified==0)
                                            No verificado
                                           @else
                                            Verificado
                                           @endif
                                    </td>

                                    <td>
                                          @if($u->status==1)
                                            No verificado
                                          @elseif($u->status==2)
                                            Verificado
                                          @endif
                                    </td>

                                    <td>
                                          @if($u->level==1)
                                            Inactivo
                                          @elseif($u->level==2)
                                            Activo
                                          @elseif($u->level==3)
                                            Administrador
                                          @endif
                                    </td>

                                    <td>
                                         {{ $u->created_at }}
                                    </td>


                                    <td>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#{{ $u->id }}" style="color: #FFFFFF; font-weight: bold">Detalles</button>
                                    <form method="post" action="usersAdmControl/{{ $u->id }}">
                                      {{ method_field('DELETE') }}
                                      {{ csrf_field() }}
                                    <input type="text" name="id" hidden="true"  value="{{ $u->id }}">
                                    <button class="btn btn-danger btn-sm" style="color: #FFFFFF; font-weight: bold">Eliminar</button>
                                    </form>

                                    </td>


                                    <!-- Modal -->
                                    <div id="{{ $u->id }}" class="modal fade" role="dialog">
                                      <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h2 class="modal-title">  <a href="/usersControl/{{ $u->id }}">{{ ucfirst($u->first_name) }} {{ ucfirst($u->last_name) }} </a></h2>
                                          </div>


                                          <div role="tabpanel">

                                            <ul class="nav nav-tabs" role="tablist">
                                              <li role="presentation" class="active"><a href="#{{ $u->id }}ID" aria-controls="ID" data-toggle="tab" role="tab">ID</a></li>
                                               <li role="presentation"><a href="#{{ $u->id }}Datos" aria-controls="Datos" data-toggle="tab" role="tab">Datos</a></li>
                                                <li role="presentation"><a href="#{{ $u->id }}Anuncios" aria-controls="Anuncios" data-toggle="tab" role="tab">Anuncio</a></li>
                                            </ul>

                                            <div class="tab-content">
                                              <div role="tabpanel" class="tab-pane active" id="{{ $u->id }}ID">
                                                <div class="modal-body">
                                                  @if($u->url_user==NULL || $u->url_user=='NULL')
                                                    <img src="/imgusers/user.png" class="">
                                                  @else
                                                    <img src="/imgusers/{{ $u->url_user }}" class="img img-responsive" style="width: 20%; height: 20%">
                                                  @endif
                                                  <br>

                                                  <br>Documento: Parte frontal <br>
                                                    @if($u->url_front==NULL)
                                                        <img src="/imgfiles/no_image.png" class="">
                                                    @else
                                                        <img src="/imgid/{{ $u->url_front }}" class="img img-responsive" style="width: 30%; height: 30%">
                                                    @endif

                                                    <br>Documento: Parte posterior <br>
                                                    @if($u->url_back==NULL)
                                                        <img src="/imgfiles/no_image.png" class="">
                                                    @else
                                                        <img src="/imgid/{{ $u->url_back }}" class="img img-responsive" style="width: 30%; height: 30%">
                                                    @endif
                                                  <br>
                                                   @if($u->status == 1)
                                                   <form method="get" action="usersAdmControl/{usersAdmControl}/edit">
                                                   <input type="email" name="destiny" hidden="true"  value="{{ $u->email }}">
                                                   <input type="text" name="id" hidden="true"  value="{{ $u->id }}">
                                                    <button class="btn btn-warning btn-sm" style="color: #FFFFFF; font-weight: bold">Verificar</button>
                                                    </form>
                                                    @else
                                                    Verificado
                                                    @endif


                                                  </div>
                                              </div>
















                                              <div role="tabpanel" class="tab-pane" id="{{ $u->id }}Datos">
                                                <div class="modal-body">
                                                  @if($u->url_user==NULL || $u->url_user=='NULL')
                                                    <img src="/imgusers/user.png" class="">
                                                  @else
                                                    <img src="/imgusers/{{ $u->url_user }}" class="img img-responsive" style="width: 20%; height: 20%">
                                                  @endif
                                                  <br>


                                                   <div><b>Nombre</b><p class="pull-right">{{ ucfirst($u->first_name) }}</p></div><br>
                                                   <div><b>Apellido</b><p class="pull-right">{{ ucfirst($u->last_name) }}</p></div><br>
                                                   <div><b>Sexo</b>
                                                   <p class="pull-right">
                                                     @if($u->gender=='1')
                                                      Masculino
                                                     @else
                                                      Femenino
                                                     @endif
                                                   </p></div><br>

                                                   <div><b>Teléfono</b><p class="pull-right">{{ $u->cellphone }}</p></div><br>
                                                   <div><b>Correo</b><p class="pull-right">{{ $u->email }}</p></div><br>
                                                   <div><b>Dirección</b><p class="pull-right">{{ $u->address }}</p></div>


                                                  </div>
                                              </div>




















                                              <div role="tabpanel" class="tab-pane" id="{{ $u->id }}Anuncios">
                                                <div class="modal-body">
                                                  @if($u->url_user==NULL || $u->url_user=='NULL')
                                                    <img src="/imgusers/user.png" class="">
                                                  @else
                                                    <img src="/imgusers/{{ $u->url_user }}" class="img img-responsive" style="width: 20%; height: 20%">
                                                  @endif
                                                  <br>


                                                   <div><b>Titulo</b>
                                                   <p class="pull-right">
                                                    @foreach($publication as $p)
                                                      @if($u->id == $p->id_user)
                                                        {{ $p->title }}
                                                      @endif
                                                    @endforeach
                                                   </p>
                                                   </div><br>

                                                   <div><b>Descripción</b>
                                                   <p class="pull-right">
                                                   @foreach($publication as $p)
                                                      @if($u->id == $p->id_user)
                                                        {{ $p->description }}
                                                      @endif
                                                    @endforeach
                                                   </p></div><br>

                                                   <div><b>Tipo de casa</b>
                                                   <p class="pull-right">
                                                     @foreach($publication as $p)
                                                        @foreach($houses as $h)

                                                          @if($u->id == $p->id_user)
                                                            @if($p->id_house == $h->id)
                                                              {{ $h->type }}
                                                            @endif
                                                          @endif

                                                        @endforeach
                                                      @endforeach
                                                   </p></div><br>

                                                  <div><b>Tipo de mascotas</b>
                                                   <p class="pull-right">
                                                     @foreach($publication as $p)
                                                        @foreach($pets as $pe)
                                                          @foreach($tpets as $tp)

                                                            @if($u->id == $p->id_user)
                                                              @if($p->id == $pe->id_publication)
                                                                  @if($pe->id_pet == $tp->id)
                                                                    {{ $tp->type }}<br>
                                                                  @endif
                                                              @endif
                                                            @endif

                                                          @endforeach
                                                        @endforeach
                                                      @endforeach
                                                   </p></div><br>


                                                <div><b>Imágenes</b>
                                                 <br>
                                                  @foreach($publication as $p)
                                                        @foreach($files as $f)


                                                            @if($u->id == $p->id_user)
                                                              @if($p->id == $f->id_publication)
                                                                  <img src="imgfiles/{{ $f->url_file }}" class="img img-responsive" style="width: 30%; height: 30%">
                                                                    <br>

                                                              @endif
                                                            @endif


                                                        @endforeach
                                                      @endforeach
                                                </div>
                                                  @foreach($publication as $p)
                                                    @if($u->id == $p->id_user)

                                                      @if($p->verified == 0)
                                                        <form method="get" action="publications/{{ $p->id }}/edit">
                                                          <input type="text" name="destiny" hidden="true" value="{{ $u->email }}">
                                                          <input type="text" name="idUser" hidden="true" value="{{ $u->id }}">
                                                          <button class="btn btn-warning btn-sm" name="idV" style="color: #FFFFFF; font-weight: bold">Verificar</button>


                                                        </form>
                                                      @else
                                                        Verificado

                                                        <form method="get" action="publications/{{ $p->id }}/edit">
                                                          <input type="text" name="idUser"  hidden="true" value="{{ $u->id }}">
                                                          <input type="text" name="destiny" hidden="true" value="{{ $u->email }}">

                                                           <button class="btn btn-danger btn-sm" name="banPub" style="color: #FFFFFF; font-weight: bold">Ocultar</button>
                                                        </form>
                                                      @endif


                                                    @endif
                                                  @endforeach

                                                  </div>
                                              </div>
                                            </div>

                                          </div>















                                          <!-- BOTONES DEL MODAL -->
                                         <!-- BOTONES DEL MODAL -->
                                          <div class="modal-footer">
                                          <form method="post" class="form-inline" action="usersAdmControl/{{ $u->id }}">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                              <input type="text" name="id" hidden="true"  value="{{ $u->id }}">
                                              <button class="btn btn-danger btn-sm" style="color: #FFFFFF; font-weight: bold">Eliminar usuario</button>
                                          </form>

                                            <form method="post" class="form-inline" action="usersAdmControl/{{ $u->id }}">
                                            {{ method_field('PUT') }}
                                            {{ csrf_field() }}
                                              <input type="email" name="destiny" hidden="true"  value="{{ $u->email }}">
                                              <input type="submit" class="btn btn-success" name="MAdmin" value="Hacer administrador">
                                              <input type="submit" class="btn btn-primary" name="QAdmin" value="Quitar administrador">
                                              <input type="submit" class="btn btn-danger" name="Ban" value="Ban">


                                            </form>

                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                </tr>

                                <!-- Modal verificar
<div id="modalVerify{{ $u->id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Atención</h4>
      </div>
      <div class="modal-body">
        <p>¿Seguro de querer verificar al usuario {{ $u->first_name }}  {{ $u->last_name }}?</p><br>
        <table>
            <tr>
                <td>
                   <form method="get" action="/usersAdmControl/{usersAdmControl}/edit">
                   <input type="text" name="id" hidden="true"  value="{{ $u->id }}">
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

 Modal Ban
<div id="modalBan{{ $u->id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Atención</h4>
      </div>
      <div class="modal-body">
        <p>¿Seguro de querer banear al usuario {{ $u->first_name }}  {{ $u->last_name }}?</p><br>

        <table>
            <tr>
                <td>
                    <form method="post" class="form-inline" action="/usersAdmControl/{{ $u->id }}">
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

<!-- Modal Madmin
<div id="modalMadmin{{ $u->id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Atención</h4>
      </div>
      <div class="modal-body">
        <p>¿Seguro de querer dar derechos de administrador al usuario {{ $u->first_name }}  {{ $u->last_name }}?</p><br>

        <table>
            <tr>
                <td>
                     <form method="post" class="form-inline" action="/usersAdmControl/{{ $u->id }}">
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

<!-- Modal Qadmin
<div id="modalQadmin{{ $u->id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Atención</h4>
      </div>
      <div class="modal-body">
        <p>¿Seguro de querer dar derechos de administrador al usuario {{ $u->first_name }}  {{ $u->last_name }}?</p><br>

        <table>
            <tr>
                <td>
                    <form method="post" name="ban" class="form-inline" action="/usersAdmControl/{{ $u->id }}">
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
-->
                                @endforeach
                                </table>
                            </div>
                            {{ $users->appends(Request::only(['name','status','verified','level']))->links() }}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
