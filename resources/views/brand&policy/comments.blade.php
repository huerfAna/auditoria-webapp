@extends('templates.brand')

@section('content')
<div class="banner comments">
	<div class="content">
		<h1>Dejanos tus comentarios</h1>
		<p>Comentarios y sugerencias.</p>
	</div>
</div>

<div class="content">
	<form action="" name="form" class="form" style="margin: 40px;">
		<div class="input-group">
			<input type="text" name="comment" id="comment" class="box">
			<label for="comment" class="label">Escribe tu comentario:</label>
		</div>
		<input type="submit" value="ENVIAR" id="btn-submit">
	</form>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/scripts.js') }}"></script>
@endsection