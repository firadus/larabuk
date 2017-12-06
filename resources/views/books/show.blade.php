@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4">
      		<p class="lead">Lihat Buku</p>
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

	<div class="row">
		<table class="table table-striped table-hover">
		  	<thead>
		    	<tr class="success">
		      		<th>No</th>
		      		<th>Judul</th>
		      		<th>Review</th>
		    	</tr>
		  	</thead>
		  	<tbody>
		    	<tr class="info">
		      		<td>{{ $books->id }}</td>
		      		<td>{{ $books->judul }}</td>
		      		<td>{{ $books->review }}</td>
		    	</tr> 
		  	</tbody>
		</table> 
	</div>
</div>
@endsection