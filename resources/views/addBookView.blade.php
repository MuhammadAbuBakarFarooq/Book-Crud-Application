@extends('layouts.app')
@section('content')
@include('partials.error')

<div class="container">
  <div class="row">
    <div class="col-12">
        <h2 class="text-center mb-3">Add Book Detail</h2>
    </div>
  </div>
  <div class="row">

    <div class="col-2"></div>

    <div class="col-8 p-5" style="background: white;  border-radius: 4px;">
      <form action="{{route('saveNewBook')}}" method="POST">
       @csrf
       <div class="form-group">
        <label for="exampleFormControlInput1">ISBN</label>
        <input type="numeric" name="isbn" class="form-control" id="exampleFormControlInput1" placeholder="ISBN Number">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Title</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Book Name">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Category</label>
        <select class="form-control" name="type" id="exampleFormControlSelect1">
          <option>Fiction</option>
          <option>Science Fiction</option>
          <option>Classic</option>
          <option>Poetry</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Author</label>
        <input type="text" name="author" class="form-control" id="exampleFormControlInput1" placeholder="Ali">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Price</label>
        <input type="number" name="price" class="form-control" id="exampleFormControlInput1" placeholder="Price in PKR">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Language</label>
        <select class="form-control" name="language" id="exampleFormControlSelect1">
          <option>English</option>
          <option>Urdu</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <button class="btn btn-primary">Submit</button>
    </form></div></div>
    <div class="col-2"></div>
  </div>
    @endsection
