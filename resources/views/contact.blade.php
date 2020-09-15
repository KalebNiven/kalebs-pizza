@extends('layouts.app')

@section('content')


    <!-- jumbotron -->

    <div class="container px-5">
        <div class="row justify-content-center py-3">
            <div class="col-md-10 text-center">
                <h1 class="mb-0 display-4 fw-500 d-flex justify-content-center">
                    <p class="text-danger">C</p>
                    <p class="text-danger">O</p>
                    <p class="text-blue">N</p>
                    <p class="text-blue">T</p>
                    <p class="text-yellow">A</p>
                    <p class="text-yellow">C</p>
                    <p class="text-yellow">T</p>
                    &nbsp;
                    <p class="text-danger">U</p>
                    <p class="text-danger">S</p>
                </h1>
            </div>
        </div>
    </div>


    <!-- brand-products -->

    <div class="container px-5">
        <div class="row justify-content-center">
            <div class="col-md-10 px-0 py-4">
                <div class="row justify-content-center">
                    @foreach ($contacts as $item)
                        <div class="col-sm-12 col-md-4 col-lg-4 my-2">
                            <div class="border-0 bg-contact">
                            <div class="card-body text-center pt-2">
                                <div class="pb-1">
                                    <img src="{{ url('public/web/assets/images/marker.png') }}" class="img-fluid" alt="">
                                </div>
                                <h4 class="mb-2 fw-600">{{ $item->country }}</h4>
                                <p class="mb-2 text-gray">{{ $item->city }}</p>
                                                                 <div class="d-flex align-items-center justify-content-center fs">
                                    <i class="fa fa-user text-danger font-weight-bold" aria-hidden="true"></i>
                                    <p class="mb-0 pl-2 text-gray">{{ $item->name }}</p>
                                </div>
                                 <div class="d-flex align-items-center justify-content-center fs">
                                    <i class="fa fa-map text-danger font-weight-bold" aria-hidden="true"></i>
                                    <p class="mb-0 pl-2 text-gray">{{ $item->address }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-center fs">
                                    <i class="fa fa-phone text-danger font-weight-bold" aria-hidden="true"></i>
                                    <p class="mb-0 pl-2 text-gray">{{ $item->phone1 }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-center fs">
                                    <i class="fa fa-fax text-danger font-weight-bold" aria-hidden="true"></i>
                                    <p class="mb-0 pl-2 text-gray">{{ $item->phone2 }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-center fs">
                                    <i class="fa fa-envelope text-danger font-weight-bold" aria-hidden="true"></i>
                                    <p class="mb-0 pl-2 text-gray">{{ $item->email }}</p>
                                </div>

                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

