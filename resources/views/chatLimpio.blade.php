@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                   
                        

                        <form  method="POST" action="/mensajeN" class="form-group">
                            {{ csrf_field() }}
                            <input type="text" name="message">
                            <input type="text" hidden="true" value="{{ $user2->id }}" name="idR">
                            <input type="text" hidden="true" value="{{ Auth::user()->id }}" name="idS">
                            <input type="submit" name="chat" value="Enviar">
                        </form>

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
