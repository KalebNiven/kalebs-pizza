@extends('layouts.app')

@section('content')
@php($title = 'Login' )
@include('layouts.page-header');


<div class="container px-5">
    <div class="row justify-content-center py-4">
       <div class="col-md-6">
        @include('layouts.alerts')
            <form action="{{ route('login') }}" method="post" style="padding-top: 20%;padding-bottom: 20%">@csrf
                <div class="form-group">
                  <label for="">Email Address</label>
                  <input type="email" name="email" id="email" class="form-control" >
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" name="password" id="password" class="form-control" >
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-danger">Login</button>
                    <a href="{{ route('register') }}" class="btn btn-link">Create Account</a>
                </div>

            </form>
       </div>
    </div>
</div>

@endsection
