@extends('templates.brand')

@section('content')
<div class="banner">
	<div class="content right-text">
		<h1>Desarrolladores Dussan</h1>
		<p>Los programadores tambien queremos fama<br> ¡Buscanos en LinkedIn!</p>
	</div>
</div>
<div class="canvas-grayspace">
	<div class="content">
		<div class="center-text">
			<h2>Conoce a nuestros desarrolladores</h2>
			<strong>Conoce nuestro genial equipo de desarrollo, descubre lo que hacen y conecta con ellos.</strong>
		</div>
		<div class="creator" style="margin-top:80px;">
			<div class="creator-body">
				<div class="creator-banner"></div>
				<div class="creator-info">
					<img src="{{ asset('img/banners/avatar.png') }}" alt="avatar">
					<div class="creator-data">
						<p>
							<strong>Cristhofer Ordaz Piña</strong>
							<span>Desarrollador Frontend</span>
						</p>
						<p>
							<i class="icon icon-sort2 target-description" data-item="1"></i>
						</p>
					</div>	
				</div>
			</div>
			<div class="creator-description show-1">
				<p>
					Apasionado por la tecnología y amante del buen cafe, soy un desarrollador frontend que le encanta realizar User Interface and User Experience. Ver como el usuario descubre y aprende el uso de cada interfaz nueva, diseñar interfaces intuitivas y diseñar proyectos que marquen tendencia. Dentro de mis herramientas diarias se encuentran AngularJS, Stylus, JQuery, Laravel me encanta programar JavaScript pero tambien manejo PHP, Ruby y un poco de Java. Puedes encontrarme en las redes sociales como @itachiDev, me encanta compartir mi trabajo.
				</p>
			</div>
		</div> 
		<div class="creator">
			<div class="creator-body">
				<div class="creator-banner backend"></div>
				<div class="creator-info">
					<img src="{{ asset('img/banners/avatar-backend.jpg') }}" alt="avatar">
					<div class="creator-data">
						<p>
							<strong>Ana Sanchez Dorado</strong>
							<span>Desarrollador Backend</span>
						</p>
						<p>
							<i class="icon icon-sort2 target-description" data-item="2"></i>
						</p>
					</div>	
				</div>
			</div>
			<div class="creator-description show-2">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum quod consequuntur error ratione unde repellat laudantium? Maxime deleniti molestias ipsam libero sapiente, deserunt facere, quae quibusdam illum ipsum tempora quasi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi dolore quasi, inventore provident placeat sint a labore ea, officia corporis minima possimus hic tempore assumenda voluptate, ducimus beatae consequatur cumque. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dicta, rem unde consectetur accusamus distinctio voluptatibus non et corporis molestias recusandae id tenetur. Obcaecati quaerat itaque, eaque nisi aspernatur perspiciatis!
				</p>
			</div>
		</div> 
		<div class="creator">
			<div class="creator-body">
				<div class="creator-banner manager"></div>
				<div class="creator-info">
					<img src="{{ asset('img/banners/avatar-manager.jpg') }}" alt="avatar">
					<div class="creator-data">
						<p>
							<strong>Cesar Contreras Guerrero</strong>
							<span>Senior PHP</span>
						</p>
						<p>
							<i class="icon icon-sort2 target-description" data-item="3"></i>
						</p>
					</div>	
				</div>
			</div>
			<div class="creator-description show-3">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum quod consequuntur error ratione unde repellat laudantium? Maxime deleniti molestias ipsam libero sapiente, deserunt facere, quae quibusdam illum ipsum tempora quasi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi dolore quasi, inventore provident placeat sint a labore ea, officia corporis minima possimus hic tempore assumenda voluptate, ducimus beatae consequatur cumque. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dicta, rem unde consectetur accusamus distinctio voluptatibus non et corporis molestias recusandae id tenetur. Obcaecati quaerat itaque, eaque nisi aspernatur perspiciatis!
				</p>
			</div>
		</div> 
	</div>
</div>
@endsection

@section('scripts')
<script>
	
$('.target-description').click(function(){
	var data = $(this).data("item");
	$('.show-'+data).toggle(300, "linear");
});
</script>
@endsection