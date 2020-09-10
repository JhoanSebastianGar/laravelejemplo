@extends('layauts.app')
@section('title','Create')
@section('content')
@include('common.success')
<h1>Listado</h1>
<div class="row">
	@foreach($cruds as $crud)
	<div class="col-sm">
		<div class="card text-center" style="width: 18rem;">
			<img class="card-img-top" src="/images/{{$crud->avatar}}" width="70" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title">{{$crud->name}}</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<a href="/Crud/{{$crud->slug}}" class="btn btn-primary">Ver mas</a>
			</div>
		</div>
	</div>
	@endforeach
</div>

@endsection	
