@extends('layouts.admin-app')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Contact</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.contact.index')}}">Manage</a></li>
                    <li class="breadcrumb-item active">Create New</li>
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


                <form action="{{ route('admin.contact.store') }}" method="post"> @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Country</label>
                        <input type="text" class="form-control" id="country" name="country">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">City</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" id="phone1" name="phone1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fax</label>
                        <input type="text" class="form-control" id="phone2" name="phone2">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    

                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                </form>

            </div> <!-- end card-body-->
        </div>
    </div>
</div>

@endsection @section('js')

@endsection
