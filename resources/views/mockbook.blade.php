@extends('layouts.app')

@section('content')


<div class="container">	
  <div class="row">
    <div class="col-md-4 offset-md-1">
      <div class="product col-md-3 service-image-left">
        <img id="item-display" src="{{ asset('images/bad-blood.jpg')}}" alt="">
      </div>
    </div>

    <div class="col-md-6">
      <div class="product-title">{{($book->title)}}</div>
      <div class="product-desc">{{($version->description)}}</div>
      <div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
      <hr>
      <div class="product-price">Category: {{($book->category)}}</div>
      <div class="product-price">Author: {{($book->author)}}</div>
      <div class="product-price">Language: {{($version->language)}}</div>
      <hr>
      <div class="product-price">Price: {{($version->price)}} PKR</div>
      <div class="product-price">Version: v-{{($version->v_no)}}</div>
      <hr>
      
      @if(Auth::user())
      @if(Auth::id() == $book->user_id || Auth::user()->admin)
      
      <div class="btn-group readlist">
        <a href="{{route('book.edit', [$book->id])}}"><button type="button" class="btn btn-info"> Edit </button></a>
      </div>
      <div class="btn-group readlist">
        <a href="{{route('book.addversion', [$book->id])}}"><button type="button" class="btn btn-primary"> Add New Version </button></a>
      </div>
      @endif
      @endif


      @role('Admin')
      <div class="btn-group readlist">
       <a href="{{route('book.delete', [$book->id])}}"><button type="button" class="btn btn-danger"> Delete </button></a>
     </div>
     @endrole

   </div>

   @endsection