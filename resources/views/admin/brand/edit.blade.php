@extends('layouts.admin-app')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Brand</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.brand.index')}}">Manage</a></li>
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


                <form action="{{ route('admin.brand.update',$data['id']) }}" enctype="multipart/form-data" method="post"> @csrf @method('PATCH')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $data['name'] }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ $data['description'] }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Thumbnail</label>
                        <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" data-show-loader="true" data-default-file="{{ url($data['thumbnail']) }}" name="thumbnail"/>
                    </div>
                    <div class="form-group">
                        <label for="">Is Featured  <input value="1" type="checkbox"  data-toggle="switchery" data-color="#627898" @if($data['is_featured']) checked @endif name="is_featured" data-size="large"/></label>
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </form>

            </div> <!-- end card-body-->
        </div>
    </div>
</div>

@endsection @section('js')
<script>

</script>
@endsection
