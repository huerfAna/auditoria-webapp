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
	
	<div class="sidebar">
		<ul>
			<a href=""><li><i class="icon icon-gear40"></i><span>Auditoría</span></li></a>
			<a href=""><li><i class="icon icon-book270"></i><span>Reglas de Validación</span></li></a>
			<a href=""><li><i class="icon icon-warning5"></i><span>Sanciones</span></li></a>
			<a href=""><li><i class="icon icon-check74"></i><span>Solventaciones</span></li></a>
			<a href=""><li><i class="icon icon-upload142"></i><span>Carga de Información</span></li></a>
			<a href=""><li><i class="icon icon-question5"></i><span>Ayuda</span></li></a>
		</ul>
	</div>

	<div class="container">
		<div class="content animated fadeInUp">
		@yield('content')
		</div>
	</div>

	<div class="canvas">
		<div class="content-help animated fadeInUp">
			@yield('help')
		</div>
	</div>

	<footer>
		<div class="content">
			<div class="footer-brand">
				<img src="img/orange.jpg" alt="">
			</div>
			<ul class="list-main">
				<li><a>Información</a></li>
				<li><a>Empresa</a></li>
				<li><a>Derechos de autor</a></li>
				<li><a href="{{ url('creators') }}">Desarrolladores</a></li>
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
<script>
	$(".sidebar").hover(function(){
		setTimeout(function(){
			if($(".sidebar").is(":hover") == true)
			{
				$(".sidebar").animate({ "width": "255px" }, 300);
				$(".sidebar a li span").show();
			}
		}, 300);
	});

	$(".sidebar").mouseleave(function(){
		$(this).animate({ "width": "55px" }, 300);
		$(".sidebar a li span").hide();
	});

	var interval = 1;
	$("#logo").click(function(){
		if(interval==1){
			$('.sidebar').animate({
				left: '0',
				"width": "255px"
			});
			$(".sidebar a li span").show();
			interval= 0;
		} else{
			$('.sidebar').animate({
				left: '-55px',
				"width": "55px"
			});
			$(".sidebar a li span").hide();
			interval= 1;
		}
	});

	$(".target-close").click(function(){
		$(this).parent().fadeOut("slow");
	});

	$(".target-help").click(function(){
		$(".canvas").show();
		$("body").css({ "overflow": "hidden" });
	});

	$(".help-close").click(function(){
		$(".canvas").hide();
		$("body").css({ "overflow": "auto" });
	})
</script>
@yield('scripts')
</body>
</html>