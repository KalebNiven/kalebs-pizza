@extends('layouts.app')

@section('content')
@php($title = 'Register' )
@include('layouts.page-header');


<div class="container px-5">
    <div class="row justify-content-center py-4">
       <div class="col-md-6">
        @include('layouts.alerts')
            <form action="{{ route('register') }}" method="post" style="padding-top: 20%;padding-bottom: 20%">@csrf
                <div class="form-group">
                  <label for="">Full Name</label>
                  <input type="text" name="name" id="name" class="form-control" autocomplete="off">
                </div>


                <div class="form-group">
                  <label for="">Email Address</label>
                  <input type="email" name="email" id="email" class="form-control" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" name="password" id="password" class="form-control"  autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="">Confirm Password</label>
                  <input type="password" name="password_confirmation" id="password" class="form-control"  autocomplete="off">
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-danger">Submit</button>
                    <a href="{{ route('login') }}" class="btn btn-link">Login Account</a>
                </div>

            </form>
       </div>
    </div>
</div>

@endsection
