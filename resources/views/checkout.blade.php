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
            <h1 class="coloredText mb-0 display-4 fw-500 d-flex justify-content-center">Checkout</h1>
        </div>
    </div>
</div>


<!-- main -->
<form method="POST" action="{{ route('checkout.store') }}">
    @csrf
    <div class="container px-5">
        <div class="row justify-content-center py-4">
            <div class="col-md-8">
                @if(!Auth::check()) Returning Customer? <a href="{{ route('login') }}">Login Here</a>
                <hr> @endif

                <div class="form-group">
                    <label for="">Full Name</label>
                    <input type="text" name="name" id="" class="form-control" @if(Auth::check()) value="{{ auth()->user()->name }}" @endif>
                </div>

                <div class="form-group">
                    <label for="">Contact</label>
                    <input type="tel" name="contat" id="" class="form-control" @if(Auth::check()) value="{{ auth()->user()->contact }}" @endif>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" class="form-control" @if(Auth::check()) value="{{ auth()->user()->email }}" @endif>
                </div>
                <div class="form-group">
                    <label for="">Country</label>
                    <input type="text" name="country" id="" class="form-control" @if(Auth::check()) value="{{ auth()->user()->country }}" @endif>
                </div>
                <div class="form-group">
                    <label for="">City</label>
                    <input type="text" name="ciirt" id="" class="form-control" @if(Auth::check()) value="{{ auth()->user()->city }}" @endif>
                </div>
                <div class="form-group">
                    <label for="">State</label>
                    <input type="text" name="state" id="" class="form-control" @if(Auth::check()) value="{{ auth()->user()->state }}" @endif>
                </div>
                <div class="form-group">
                    <label for="">Zip Code</label>
                    <input type="number" name="zipcode" id="" class="form-control" @if(Auth::check()) value="{{ auth()->user()->zipcode }}" @endif>
                </div>

                <div class="form-group">
                    <label for="">Address</label>
                    <textarea class="form-control" name="address" id="" cols="30" rows="10">@if(Auth::check()) {{ auth()->user()->zipcode }} @endif</textarea>
                </div>

            </div>
            <div class="col-md-4">
                <label for="">Cart({{ count(Cart::getContent()) }})</label>
                <table class="table">
                    @foreach (Cart::getContent() as $item)
                    <tr>
                        <td>{{ $item->name }} X {{ $item->price}}</td>
                        <td>${{ $item->quantity*$item->price}} </td>
                    </tr>
                    @endforeach
                    <tr>
                        <th>Total</th>
                        <th>${{ Cart::getTotal() }}</th>
                    </tr>
                </table>
                <button type="submit" class="btn btn-danger btn-block">Complete Order</button>
            </div>

        </div>
    </div>
</form>

@endsection
