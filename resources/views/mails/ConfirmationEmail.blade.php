<!DOCTYPE html>
<html>
<head>
	<title>Confirmation Email</title>
</head>
<body>
	<h1>Gracias por registrarse</h1> 


	<p>
		Debe <a href='{{ url("register/confirm/{$user->token}") }}'>confirmar su correo electrónico</a> para continuar.
	</p>
</body>
</html>