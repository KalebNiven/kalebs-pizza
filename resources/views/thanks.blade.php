@extends('layouts.app')

@section('content')




<div class="container px-5">
    <div class="row justify-content-center">
        <div class="col-md-10 text-center py-4">
            <img src="assets/images/cover.png" class="img-fluid br-10 w-100" alt="">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10 text-center">
            <h1 class="coloredText mb-0 display-4 fw-500 d-flex justify-content-center">Thanks</h1>
            <hr>
            <p>Your Order Number is : {{ $order->id }}</p>
        </div>
    </div>
</div>



<div class="container px-5">
    <div class="row justify-content-center py-4">

    </div>
</div>
@endsection
