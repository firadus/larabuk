@extends('layouts.app')

@section('content')
<div class="container">
@if ($errors->any()) 
<div class="alert alert-danger">
	@foreach ($errors->all() as $err)
		{{ $err }}
	@endforeach
</div>
@endif
	<div class="row">
		<div class="col-md-4">
      		<p class="lead">Buku Baru</p>
    	</div>
	</div>
	<div class="row">
		<form class="form-horizontal" action="{{ route('books.store') }}" method="POST">
		  {{ csrf_field() }}
		    <div class="form-group">
		      <label for="judul" class="col-lg-2 control-label">Judul</label>
		      <div class="col-lg-10">
		        <input class="form-control" name="judul" placeholder="Judul" type="text">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="textArea" class="col-lg-2 control-label">Review</label>
		      <div class="col-lg-10">
		        <textarea class="form-control" name="review" cols="80" rows="8" placeholder="Review Sedikt"></textarea>
		      </div>
		    </div>
		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <button type="submit" class="btn btn-success">Simpan</button>
		      </div>
		    </div>
		</form>
	</div>
</div>
@endsection