@extends('templates.brand')

@section('content')
<div class="canvas-grayspace" style="argin-top:55px;"></div>

<div class="content">
	<div class="security-intro">
		<div class="security-body">
			<h2>Centro de Seguridad</h2>
			<p style="font-size: 1rem;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi architecto deleniti, vel soluta facilis perferendis laboriosam inventore veritatis debitis, pariatur id velit placeat unde cupiditate itaque recusandae rem dignissimos ad? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, nam nobis recusandae quisquam cupiditate ratione cum eaque labore ipsa ipsum, delectus dignissimos non, ut aut magni. Fugit, perferendis soluta consectetur.</p>
		</div>
		<img src="{{ asset('img/banners/security.png') }}" alt="">
	</div>

	<div class="security">
		<h2>Seguridad en Dussan</h2>
		<div class="row">
			<div class="medium-6 columns">
				<div class="item-security">
					<i class="icon icon-file128"></i>
					<div>
						<h3>Seguridad de Datos</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente consectetur ipsum doloremque.</p>
					</div>
				</div>
			</div>
			<div class="medium-6 columns">
				<div class="item-security">
					<i class="icon icon-lock8"></i>
					<div>
						<h3>Modo Restringido</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente consectetur ipsum doloremque.</p>
					</div>
				</div>
			</div>
			<div class="medium-6 columns">
				<div class="item-security">
					<i class="icon icon-whiteflag1"></i>
					<div>
						<h3>Privacidad</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente consectetur ipsum doloremque.</p>
					</div>
				</div>
			</div>
			<div class="medium-6 columns">
				<div class="item-security">
					<i class="icon icon-gear40"></i>
					<div>
						<h3>Configuración</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente consectetur ipsum doloremque.</p>
					</div>
				</div>
			</div>
			<div class="medium-6 columns">
				<div class="item-security">
					<i class="icon icon-screen88"></i>
					<div>
						<h3>Accesibilidad</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente consectetur ipsum doloremque.</p>
					</div>
				</div>
			</div>
			<div class="medium-6 columns">
				<div class="item-security">
					<i class="icon icon-cloud367"></i>
					<div>
						<h3>Capa de Persistencia</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente consectetur ipsum doloremque.</p>
					</div>
				</div>
			</div>
			<div class="medium-6 columns">
				<div class="item-security">
					<i class="icon icon-bell76"></i>
					<div>
						<h3>Notficaciones</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente consectetur ipsum doloremque.</p>
					</div>
				</div>
			</div>
			<div class="medium-6 columns">
				<div class="item-security">
					<i class="icon icon-user189"></i>
					<div>
						<h3>Control de Usuarios</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente consectetur ipsum doloremque.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection