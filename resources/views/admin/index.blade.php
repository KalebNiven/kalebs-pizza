@extends('layouts.admin-app')
@section('content')


<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <span class="badge badge-soft-primary float-right">Update</span>
                    <h5 class="card-title mb-0">Total Products</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                          {{ $product }}
                        </h2>
                    </div>
                    <div class="col-4 text-right">
                        <span class="text-muted"> <i class="mdi mdi-arrow-up text-primary"></i></span>
                    </div>
                </div>

                <div class="progress shadow-sm" style="height: 7px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 57%;"></div>
                </div>
            </div>
        </div>
    </div> <!-- end col-->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <span class="badge badge-soft-primary float-right">Update</span>
                    <h5 class="card-title mb-0">Total Orders</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                          {{ $order }}
                        </h2>
                    </div>
                    <div class="col-4 text-right">
                        <span class="text-muted"> <i class="mdi mdi-arrow-up text-primary"></i></span>
                    </div>
                </div>

                <div class="progress shadow-sm" style="height: 7px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 57%;"></div>
                </div>
            </div>
        </div>
    </div> <!-- end col-->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <span class="badge badge-soft-primary float-right">Update</span>
                    <h5 class="card-title mb-0">Registered Users</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                          {{ $user}}
                        </h2>
                    </div>
                    <div class="col-4 text-right">
                        <span class="text-muted"> <i class="mdi mdi-arrow-up text-primary"></i></span>
                    </div>
                </div>

                <div class="progress shadow-sm" style="height: 7px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 57%;"></div>
                </div>
            </div>
        </div>
    </div> <!-- end col-->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <span class="badge badge-soft-primary float-right">Update</span>
                    <h5 class="card-title mb-0">Total Categories</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                          {{ $cats}}
                        </h2>
                    </div>
                    <div class="col-4 text-right">
                        <span class="text-muted"> <i class="mdi mdi-arrow-up text-primary"></i></span>
                    </div>
                </div>

                <div class="progress shadow-sm" style="height: 7px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 57%;"></div>
                </div>
            </div>
        </div>
    </div> <!-- end col-->


</div>

@endsection
