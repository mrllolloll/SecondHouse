@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> 
                    <div class="container">
                        <div class="row">

                        <section>
                          

                            <div class="row">
                                <div class="col-md-8">
                                    <table class="table">
                                        <tr><td>Fecha de inicio {{ $beginDate }}</td><td>Fecha de culminación {{ $endDate }}</td></tr>
                                        <tr><td>Tipo de mascota {{ $pet }}</td></tr>
                                        <tr><td>Total de días {{ $days }}</td><td>Precio ${{ $total }}COP</td></tr>
                                    </table>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Confirmar reservación</button>

                                </div>
                            </div>
                            
                           
                        </section>
                     
                           <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Confirmar reservación</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Una vez confirmada la reservación, será registrada, si desea cancelar debe contactar al cuidador en cuestión para dar aviso</p>
                                  </div>
                                  <div class="modal-footer">

                                    <form action="/confirm-reservation" method="post" class="form-group">
                                        {{ csrf_field() }}
                                        <input type="text" value="{{ Auth::user()->id }}" hidden="true" name="user_id">
                                        <input type="text" value="{{ $beginDate }}" hidden="true" name="beginDate">
                                        <input type="text" value="{{ $endDate }}" hidden="true" name="endDate">
                                        <input type="text" value="{{ $publicationID }}" hidden="true" name="publication_id">
                                        <input type="text" value="{{ $idHost }}" hidden="true" name="idHost">
                                        <input type="submit" class="btn btn-primary" value="Confirmar reserva">
                                    </form> 

                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                  </div>
                                </div>

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
