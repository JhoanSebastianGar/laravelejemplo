@extends('layauts.app')
@section('title','Actualizar')
@section('content')
<div class="container">
	@include('common.errors')
	{!! Form::model($crud,['route'=>['Crud.update', $crud],'method'=>'PUT','files'=> true ]) !!}
	@include('layauts.form')
	{!! Form::submit('Actualizar',['class'=>'btn btn-success']) !!}
	{!! Form::close() !!}
</div>
<!--
<div class="container">
	<form class="form-group" method="POST" action="/Crud/$crud->slug" enctype="multipart/form-data">
		method('PUT')
		csrf
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="name" value="{{$crud->name}}" class="form-control">
		</div>

		<div class="form-group">
			<label for="avatar">Avatar</label>
			<input type="file" name="avatar" >
		</div>

		<button type="submit" class="btn btn-success">Editar</button>
	</form>
</div>
-->
@endsection
