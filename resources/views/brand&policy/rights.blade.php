@extends('templates.brand')

@section('content')
<div class="banner rights">
	<div class="content right-text">
		<h1>Derechos de Autor</h1>
		<p>Politica de derechos de autor.</p>
	</div>
</div>

<div class="content">
	<div class="security-intro">
		<div class="security-body">
			<h2>Derechos de Autor</h2>
			<p style="font-size: 1rem;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi architecto deleniti, vel soluta facilis perferendis laboriosam inventore veritatis debitis, pariatur id velit placeat unde cupiditate itaque recusandae rem dignissimos ad? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, nam nobis recusandae quisquam cupiditate ratione cum eaque labore ipsa ipsum, delectus dignissimos non, ut aut magni. Fugit, perferendis soluta consectetur.</p>
		</div>
		<img src="{{ asset('img/banners/rights.jpg') }}" alt="">
	</div>

	<div class="security rights-terms">
		<h2>Más información sobre lo derechos de autor en Dussan</h2>
		<div class="row">
			<div class="medium-6 columns">
				<div class="item-security">
					<i class="icon icon-book270"></i>
					<div>
						<h3>Que son los derechos de autor</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente consectetur ipsum doloremque.</p>
					</div>
				</div>
			</div>
			<div class="medium-6 columns">
				<div class="item-security">
					<i class="icon icon-news"></i>
					<div>
						<h3>Uso legítimo</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente consectetur ipsum doloremque.</p>
					</div>
				</div>
			</div>
			<div class="medium-6 columns">
				<div class="item-security">
					<i class="icon icon-smiley3"></i>
					<div>
						<h3>Creative Commons</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente consectetur ipsum doloremque.</p>
					</div>
				</div>
			</div>
			<div class="medium-6 columns">
				<div class="item-security">
					<i class="icon icon-speechbubble34"></i>
					<div>
						<h3>Preguntas Frecuentes</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente consectetur ipsum doloremque.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection