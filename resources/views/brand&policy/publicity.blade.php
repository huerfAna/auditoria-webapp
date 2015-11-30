@extends('templates.brand')

@section('content')
	<div class="banner publicity">
		<div class="content right-text">
			<h1>Más Aplicaciones</h1>
			<p>Conoce nuestras otras aplicaciones<br>Soluciones empresariales en materia de comercio exterior.</p>
		</div>
	</div>

	<div class="content">
		<div class="paper">
			<h1>Descubre nuestros otros productos &nbsp;¡Seguro te interesan!</h1>
			<div class="publicity-content">
				<p style="font-size: 1rem;">
					Sece.Net, es el Software más flexible, completo y poderoso del mercado mexicano permite mejorar el proceso de toma de decisiones en materia de comercio exterior transformando su información en conocimiento, permitiéndole contar con un sistema automatizado de control de inventarios para dar cumplimiento a las disposiciones establecidas en el artículo 59 de la Ley Aduanera y sus reglamentos.
					<a href="http://www.prasad-team.com/secenet">Visitar Secenet</a>
				</p>
				<p style="text-align: right;">
					<img src="{{ asset('img/banners/secenet.jpg') }}" alt="secenet">
				</p>
			</div>
			<div class="publicity-content">
				<p style="font-size: 1rem">
					Nuestro Software Venta Net le facilita la elaboración de los COVE (Comprobante de verificación Electrónico) requeridos para las importaciones y exportaciones siendo esta una obligación para todas empresas que realicen operaciones de comercio exterior.
					<a href="http://www.prasad-team.com/ventanet">Visitar Ventanet</a>
				</p>
				<p style="text-align: right;">
					<img src="{{ asset('img/banners/ventanet.jpg') }}" alt="ventanet">
				</p>
			</div>
		</div>
	</div>
@endsection