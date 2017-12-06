@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4">
      		<p class="lead">Index Buku</p>
    	</div>
    	<div class="col-md-4 col-md-offset-4">
			<a href="{{ route('books.create') }}" class="btn btn-success new">Buat Buku</a>
    	</div>
	</div>
	
	<div class="col-md-12">
		@if (Session::has('save'))
			<div class="alert alert-dismissible alert-success">
				{{ Session::get('save')}}
			</div>
		@endif
	</div>

	<div class="col-md-12">
		@if (Session::has('delete'))
			<div class="alert alert-dismissible alert-success">
				{{ Session::get('delete')}}
			</div>
		@endif
	</div>

	<div class="row">
		<table class="table table-striped table-hover">
		  	<thead>
		    	<tr class="success">
		      		<th>No</th>
		      		<th>Judul</th>
		      		<th>Opsi</th>
		    	</tr>
		  	</thead>
		  	@foreach ($books as $b)
		  	<tbody>
		    	<tr class="info">
		      		<td>{{$b->id}}</td>
		      		<td>{{$b->judul}}</td>
		      		<td>
		      			<a href="{{ route('books.show', $b->slug) }}" class="btn btn-success">View</a>
		      			<a href="{{ route('books.edit', $b->slug) }}" class="btn btn-success">Edit</a>
		      			<form action="{{ route('books.show',$b->slug) }}" method="POST">
		      				{{ csrf_field() }}
		      				{{ method_field('delete')}}
		      				<input type="submit" class="btn btn-success" value="Delete">
		      			</form>
		      		</td>
		    	</tr>
		  	</tbody>
		  	@endforeach
		</table> 
		{{ $books->links() }}
	</div>
</div>
@endsection