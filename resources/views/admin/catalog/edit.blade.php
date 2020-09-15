@extends('layouts.admin-app')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Catalog</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.catalog.index')}}">Manage</a></li>
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


                <form action="{{ route('admin.catalog.update',$data['id']) }}" enctype="multipart/form-data" method="post"> @csrf @method('PATCH')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Catalog Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $data['name'] }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ $data['description'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Youtube Video Link</label>
                        <input type="url" class="form-control" id="video_link" name="video_link" value="{{ $data['video_link'] }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" >Category</label>
                        <select class="form-control" name="category" id="category">
                            <option value="">select</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" >Brand</label>
                        <select class="form-control" name="brand" id="brand_id">
                            <option value="">select</option>
                            @foreach ($brands as $item)
                                <option   value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Thumbnail</label>
                                <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" data-show-loader="true" data-default-file="{{ url($data['thumbnail']) }}" name="thumbnail"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">PDF</label>
                                    <input type="file" class="dropify" data-allowed-file-extensions="pdf" data-show-errors="true" data-show-loader="true"  name="pdf"/>
                                </div>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </form>

            </div> <!-- end card-body-->
        </div>
    </div>
</div>

@endsection @section('js')
<script>
    $(document).ready(function(){
        $("#category").val("{{ $data['category_id'] }}").trigger('change');
        $("#brand_id").val("{{ $data['brand_id'] }}").trigger('change');
    });
</script>
@endsection
