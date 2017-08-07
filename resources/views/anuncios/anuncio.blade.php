@section

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

@endsection