@extends('layouts.app')

@section('content')
@include('partials.success')
@include('partials.error')

<div class="container">
    <div class="row justify-content-center">

        <div class="container">
            <div class="row">

                @foreach($book as $f)

                <div class="card" style="width: 15rem; margin-top: 2%;">
                    <img class="card-img-top" src="{{ asset('images/bad-blood.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{($f->title)}}</h5>
                        <h5 class="card-title">{{($f->isbn)}}</h5>
                        <h5 class="card-title">{{($f->type)}}</h5>
                        <a href="{{route('mockbook', [$f->id])}}" class="btn btn-primary">Read More</a>
                        <!-- <a href="#" class="btn">{{($f->price)}} PKR</a> -->
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
