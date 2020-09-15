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
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <td>Full Name</td>
                    <td>{{ auth()->user()->name }}</td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td>{{ auth()->user()->email}}</td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td>{{ auth()->user()->contact}}</td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>{{ auth()->user()->country}}</td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>{{ auth()->user()->city}}</td>
                </tr>
                <tr>
                    <td>State</td>
                    <td>{{ auth()->user()->state}}</td>
                </tr>
                <tr>
                    <td>Zip Code</td>
                    <td>{{ auth()->user()->zipcode }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ auth()->user()->address }}</td>
                </tr>

            </table>
        </div>

    </div>
</div>


@endsection
@section('js')

<script>

</script>

@endsection
