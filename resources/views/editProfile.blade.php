@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> 

                @if(Auth::user()->url_user==NULL || Auth::user()->url_user=='NULL')
                    <img src="/imgusers/user.png" class=""> 
                @else 
                   <img src="/imgusers/{{ Auth::user()->url_user }}" class="img img-responsive" style="width: 20%; height: 20%">  
                @endif

                <h4 class="pull-right">{{ ucfirst(Auth::user()->first_name)}} {{ ucfirst(Auth::user()->last_name)}}</h4>
               	</div>

                <div class="panel-body">
                @include('partials.flash')

                <table class="table">
                <form action="/usersControl" method="GET" class="form-group">
                	<input type="text" hidden="true" name="idEdit" value="{{ Auth::user()->id }}">
	                <tr><td><input type="submit" name="editInfo" value="Editar información" class="btn col-md-3"></a></td></tr>
	                <tr><td><input type="submit" name="editEmail" value="Cambiar correo electrónico" class="btn col-md-3"></a></td></tr>
	                <tr><td><input type="submit" name="editPassword" value="Cambiar contraseña" class="btn col-md-3"></a></td></tr>
	                <tr><td><input type="submit" name="profilePic" value="Cambiar foto de perfil" class="btn col-md-3"></a></td></tr>
	                <tr><td><input type="submit" name="uploadId"  value="Cargar ID" class="btn col-md-3"></a></td></tr>
                </form>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection