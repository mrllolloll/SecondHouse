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
                              <h2>{{ ucfirst($user->first_name)}} {{ ucfirst($user->last_name)}}</h2>
                                
                                <table>
                                    <tr>
                                       
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
                                    </tr>
                                </table>
                                @endif
                                
                            @endif
                        @if($user->publication == 1)





                        
                        
                         
                           @if($user->id == Auth::user()->id && $publication->verified == 0)
                                Verificación pendiente
                            @endif

                         
                       
                         <!-- Anuncio  INFORMACIÓN -->
                        @if($user->id != Auth::user()->id && $publication->verified == 0)

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
                         


                        @else

                        @endif
                                
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
