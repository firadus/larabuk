@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4">
      		<p class="lead">Edit Buku</p>
    	</div>
	</div>
	<div class="row">
		<form class="form-horizontal" action="{{ route('books.update',$books->slug) }}" method="POST">
		{{csrf_field()}}
		{{method_field('PUT')}}
		  <fieldset>
		    <div class="form-group">
		      <label for="judul" class="col-lg-2 control-label">Judul</label>
		      <div class="col-lg-10">
		        <input class="form-control" name="judul" placeholder="Judul" type="text" value="{{$books->judul}}">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="textArea" class="col-lg-2 control-label">Review</label>
		      <div class="col-lg-10">
		        <textarea class="form-control" name="review" cols="80" rows="8" placeholder="Review Sedikt" value="{{$books->review}}"></textarea>
		      </div>
		    </div>
		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <button type="submit" class="btn btn-success">Simpan</button>
		      </div>
		    </div>
		  </fieldset>
		</form>
	</div>
</div>
@endsection