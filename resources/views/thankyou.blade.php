@extends('layouts.app') 

@section('content')
@if(session('status'))
<div class="alert alert-success">
 {{session('status')}}
</div>
@endif
<div class="container text-center mt-5">
    <h1 class="text-success">Thank You!</h1>

    <p>Your order has been placed successfully.</p>
    <a href="{{ url('index') }}" class="btn btn-primary mt-3">Back to Home</a>
</div>
@endsection
