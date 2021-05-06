@extends('layouts.app')
@section('title', 'By The Book | Add Verison')
@section('content')

@include('partials.error')

<div class="container py-3 add-book">
	<div class="row">
		 <div class="col-2"> </div>
      <div class="col-8"> 
			<h2 class="text-center mb-3">Add New Version</h2>
			<div class="card card-outline-secondary">
				<div class="card-header">
					<h3 class="mb-0">New Version</h3>
				</div>
				<div class="card-body">
					<form class="form" role="form" action="{{route('version.update')}}" method="Post">
						@csrf
						<div class="form-group">
							<label for="uname1">Book ISBN</label> 
							<input class="form-control" id="uname1" name="isbn" type="number" value="{{($book->isbn)}}" readonly="readonly">
						</div>
						<div class="form-group">
							<label for="uname1">Book Title</label> 
							<input class="form-control" id="uname1" name="title" type="text" value="{{($book->title)}}" disabled>
						</div>

						<div class="form-group">
							<label>Category</label>
							<select id="type" class="form-control" name="type" value="{{($book->category)}}" disabled>
								<option>Fiction</option>
								<option>Science Fiction</option>
								<option>Classic</option>
								<option>Poetry</option>
							</select>
						</div>

						<div class="form-group">
							<label for="uname1">Author</label> 
							<input class="form-control" id="uname1" name="author" type="text" value="{{($book->author)}}" disabled>
						</div>

						<div class="form-group">
							<label>Language</label>
							<select id="type" class="form-control" name="language">
								<option>English</option>
								<option>Urdu</option>
								
							</select>
						</div>

						<div class="form-group">
							<label>Price</label> 
							<input class="form-control" id="exampleInputAmount" type="number" name="price">     
						</div>

						<div class="form-group">
							<label for="uname1">Book Description</label> 
							<input class="form-control" id="uname1" name="description" type="text">
						</div>
						<input type="hidden" name="id" value="{{($book->id)}}">

						<button class="btn btn-success btn-lg float-right">Save</button>
					</form>
				</div>
			</div>
		</div>
		 <div class="col-2"> </div>
	</div>
</div>

@endsection