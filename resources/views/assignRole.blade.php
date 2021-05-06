@extends('layouts.app')
@section('content')
@include('partials.error')

<div class="container">
  <div class="row">
    <div class="col-12">
        <h2 class="text-center mb-3">Assign Role</h2>
    </div>
  </div>
  <div class="row">

    <div class="col-2"></div>

    <div class="col-8 p-5" style="background: white;  border-radius: 4px;">
      <form action="{{route('saveNewRole')}}" method="POST">
       @csrf
       
      <div class="form-group">
        <label for="exampleFormControlSelect1">Users</label>
        <select class="form-control" name="user" id="exampleFormControlSelect1">
          @foreach($users as $u)
          <option value="{{$u->id}}">{{$u->name}}</option>
          @endforeach
        </select>
      </div>
     
      <div class="form-group">
        <label for="exampleFormControlSelect1">Roles</label>
        <select class="form-control" name="role" id="exampleFormControlSelect1">
          @foreach($roles as $r)
          <option>{{$r->name}}</option>
          @endforeach
        </select>
      </div>
      <button class="btn btn-primary">Submit</button>
    </form>
  </div>
  </div>
    <div class="col-2"></div>
  </div>
    @endsection
