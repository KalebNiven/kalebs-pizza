@extends('layouts.admin-app')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Profile</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.profile.store') }}" method="post" enctype="multipart/form-data"> @csrf


                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="">Username</label>
                        <input text="email" class="form-control" name="username" value="{{ auth()->user()->name }}" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="">Old Password</label>
                        <input type="password" class="form-control" name="old_password" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password" class="form-control" name="new_password" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" name="new_confirm_password" autocomplete="off">
                    </div>





                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                </form>

            </div> <!-- end card-body-->
        </div>
    </div>
</div>

@endsection @section('js')

@endsection
