@extends('layouts.admin-app')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Retailer</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.retailer.index')}}">Manage</a></li>
                    <li class="breadcrumb-item active">Edit</li>
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


               <form action="{{ route('admin.retailer.update',$data['id']) }}" method="post" enctype="multipart/form-data"> 
               @csrf @method('PATCH')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Retailer Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $data['name'] }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Company Name</label>
                        <input type="text" class="form-control" id="company" name="company" value="{{ $data['company'] }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact</label>
                        <input type="text" class="form-control" id="company" name="company" value="{{ $data['contact'] }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $data['email'] }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea type="text" class="form-control" id="address" name="address">{{ $data['name'] }}</textarea>
                    </div>
                    

                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                </form>

            </div> <!-- end card-body-->
        </div>
    </div>
</div>

@endsection @section('js')
<script>
    $(document).ready(function(){
        $("#category").val("{{ $data['parent_id'] }}").trigger('change');
    });
</script>
@endsection
