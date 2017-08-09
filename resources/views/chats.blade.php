@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <table class="table table-striped">
                        @foreach($chats as $c)
                            @foreach($users as $u)
                                @if($c->user1 == Auth::user()->id)
                                    @if($u->id == $c->user2)
                                        <tr>
                                            <td>
                                            {{ $u->first_name }} {{ $u->last_name }}<br>
                                            </td>
                                            <td>
                                            <span class="pull-right">
                                                 <form  method="POST" action="/chat" class="form-group">
                                                    {{ csrf_field() }}
                                                    <input type="text" hidden="true" value="{{ $u->id }}" name="idR">
                                                    <input type="text" hidden="true" value="{{ Auth::user()->id }}" name="idS">
                                                    <input type="submit" name="chat" value="Enviar mensaje" >
                                                </form>
                                            </span>
                                            </td>
                                        </tr>
                                    @endif
                                @elseif($c->user2 == Auth::user()->id)
                                    @if($u->id == $c->user1)
                                        {{ $u->first_name }} {{ $u->last_name }}<br>
                                        <span class="pull-right">
                                             <form  method="POST" action="/chat" class="form-group">
                                                {{ csrf_field() }}
                                                <input type="text" hidden="true" value="{{ $u->id }}" name="idR">
                                                <input type="text" hidden="true" value="{{ Auth::user()->id }}" name="idS">
                                                <input type="submit" name="chat" value="Enviar mensaje" >
                                            </form>
                                        </span>
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    </table>
                           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection