@extends('layauts.app')
@section('title','Show')
@section('content')
@include('common.success')
<div class="row">
	<div class="col-sm">
		<div class="card text-center" style="width: 18rem;">
			<img class="card-img-top" src="/images/{{$crud->avatar}}" width="120" height="200" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title">{{$crud->name}}</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<a href="{{$crud->name}}/edit" class="btn btn-primary">Editar</a>
				{!!Form::open(['route'=>['Crud.destroy',$crud->slug],'method'=>'DELETE'])!!}
				{!!Form::submit('eliminar',['class'=>'btn btn-danger'])!!}
					{!! Form::close() !!}

			</div>
		</div>
	</div>
</div>
@endsection

