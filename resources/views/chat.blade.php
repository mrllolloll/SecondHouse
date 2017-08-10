@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @foreach($users as $u)
                        @if($u->id == $user2)
                            {{$u->first_name}} {{$u->last_name}}
                        @endif
                    @endforeach

                    <div class="row">
                        @foreach($chat as $c)
                            @if($c->sender_id == Auth::user()->id )
                                <span class="pull-right">
                                    <br>{{ $c->message }}<b> {{  Auth::user()->first_name }} {{  Auth::user()->last_name }}</b><br>
                                </span>
                            @else
                                <br>
                                <b>
                                @foreach($users as $u)
                                    @if($u->id == $user2)
                                       <br>  {{$u->first_name}} {{$u->last_name}}
                                    @endif
                                @endforeach</b> 
                               {{ $c->message }}<br>
                            @endif
                        @endforeach
                    </div>
                        <div class="row">
                           <form  method="POST" action="/mensajeN" class="form-group">
                            {{ csrf_field() }}
                            <input type="text" name="message">
                            <input type="text" hidden="true" value="{{ $user2 }}" name="idR">
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
</div>
@endsection
