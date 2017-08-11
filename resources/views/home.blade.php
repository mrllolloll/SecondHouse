@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                
               <form class="form-inline col-md-12" action="/searchResults/" method="GET">
                    <select name="typepets" class="form-control">
                        <option value="0"> Mascota </option>
                      @foreach($tpets1 as $t)
                        <option value="{{ $t->id }}"> {{  ucfirst($t->type) }}</option>
                      @endforeach
                    </select>
                    <select name="cities" class="form-control">
                    <option value="0"> Ciudad </option>
                      @foreach($cities as $c)
                        <option value="{{ $c->id }}"> {{ ucfirst($c->city) }}</option>
                      @endforeach
                    </select>
                    <input type="date" name="beginDate" required="true" class="form-control">
                    <input type="date" name="endDate" required="true" class="form-control">
                    <button type="submit" class="form-control btn btn-primary">Buscar</button>
                </form>  
                
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
