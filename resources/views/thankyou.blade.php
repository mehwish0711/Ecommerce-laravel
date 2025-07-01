@extends('layouts.app') 

@section('content')

@if(session('success'))
<div class="alert alert-success" style ="top:300px;">
 {{session('success')}}
</div>
@endif

<div class="container text-center mt-5 pt-5 ">
    <div class="alert alert-success">
    <h1 class="text-success ">Thank You!</h1>

    <p>Your order has been placed successfully.</p>
    </div>
    <a href="{{ url('index') }}" class="btn btn-primary mt-3">Back to Home</a>
</div>

@endsection