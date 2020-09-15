@extends('layouts.app')

@section('content')

<style>
    td{
        vertical-align: middle !important;
    }
</style>


<div class="container px-5">
    <div class="row justify-content-center">
        <div class="col-md-10 text-center py-4">
            <img src="assets/images/cover.png" class="img-fluid br-10 w-100" alt="">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10 text-center">
            <h1 class="coloredText mb-0 display-4 fw-500 d-flex justify-content-center">My Account</h1>
        </div>
    </div>
</div>


<!-- main -->

<div class="container px-5">
    <div class="row justify-content-center py-4">

        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item " style="text-transform: capitalize">{{ auth()->user()->name }}</li>
                <li class="list-group-item"><a href="{{ route('order') }}">My Orders</a></li>
                <li class="list-group-item"><a href="{{ route('profile') }}">Edit Profile</a></li>
                <li class="list-group-item"><a href="{{ route('logout') }}">Logout</a></li>
                <li class="list-group-item"><a href="{{ route('home') }}">Continue Shopping</a></li>
              </ul>
        </div>
        <div class="col-md-8">
            <form action="{{ route('profile') }}" method="POST"> @csrf
                @include('layouts.alerts')
            <table class="table">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" value="{{ auth()->user()->name }}" class="form-control" name="name"></td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td><input type="text" value="{{ auth()->user()->email }}" class="form-control" name="email"></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><input type="text" value="{{ auth()->user()->contact }}" class="form-control" name="contact"></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td><input type="text" value="{{ auth()->user()->country }}" class="form-control" name="country"></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><input type="text" value="{{ auth()->user()->city }}" class="form-control" name="city"></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><input type="text" value="{{ auth()->user()->state }}" class="form-control" name="state"></td>
                </tr>
                <tr>
                    <td>Zip Code</td>
                    <td><input type="text" value="{{ auth()->user()->zipcode }}" class="form-control" name="zipcode"></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" value="{{ auth()->user()->address }}" class="form-control" name="address"></td>
                </tr>

            </table>
            <button type="submit" class="btn btn-danger">Save</button>
        </div>
    </form>

    </div>
</div>


@endsection
@section('js')

<script>

</script>

@endsection
