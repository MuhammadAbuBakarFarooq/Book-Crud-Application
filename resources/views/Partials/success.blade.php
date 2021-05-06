@if(Session::has('success'))

<div class="container">
<div class="row pt-5">
    <div class="col-sm-12">
        <div class="alert alert-success text-center">
            {{Session::get('success')}}
        </div>
    </div>
</div>
</div>
@endif