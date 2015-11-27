<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Auditoría</title>
	<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,500' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
	<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
	@yield('styles')
</head>
<body>
	<header>
		<img src="{{ asset('img/orange.jpg') }}" alt="" id="logo">
	</header>
	
	@yield('content')

	<footer>
		<div class="content">
			<div class="footer-brand">
				<img src="img/orange.jpg" alt="">
			</div>
			<ul class="list-main">
				<li><a>Información</a></li>
				<li><a>Empresa</a></li>
				<li><a>Derechos de autor</a></li>
				<li><a>Desarrolladores</a></li>
				<li><a>Publicidad</a></li>
			</ul>
			<ul class="list-second">
				<li><a>Términos</a></li>
				<li><a>Privacidad</a></li>
				<li><a>Politica de seguridad</a></li>
				<li><a>Enviar sugerencias</a></li>
			</ul>
		</div>	
	</footer>
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
@yield('scripts')
</body>
</html>