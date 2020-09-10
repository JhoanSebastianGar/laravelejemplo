@extends('layauts.app')
@section('title','Create')
@section('content')
<div class="container">
@include('common.errors')
	{!! Form::open(['route' => 'Crud.store','method'=>'POST','files'=>true]) !!}
	@include('layauts.form')
	{!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
	{!! Form::close() !!}
</div>
<!--
<div class="container">
	<form class="form-group" method="POST" action="/Crud" enctype="multipart/form-data">
		csrf
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label for="avatar">Avatar</label>
			<input type="file" name="avatar" >
		</div>

		<button type="submit" class="btn btn-success">Guardar</button>
	</form>
</div>
endsection

-->
@endsection