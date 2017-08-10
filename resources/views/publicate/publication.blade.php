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
                            
                            <form action="/reservation" method="post" class="form-group">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                <label class="col-sm-1 col-form-label">Fecha inicio</label>
                                <div class="col-sm-2">
                                  <input type="date" class="form-control" name="beginDate" id="inputPassword">
                                </div>
                                <label class="col-sm-1 col-form-label">Fecha fin</label>
                                <div class="col-sm-2">
                                  <input type="date" class="form-control" name="endDate" id="inputPassword">
                                </div>
                              </div>

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Tipo de mascota</label>
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




@endsection
