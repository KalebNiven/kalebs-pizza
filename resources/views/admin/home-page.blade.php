@extends('layouts.admin-app')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Setting</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Setting</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.home-page.store') }}" method="post" enctype="multipart/form-data"> @csrf

                    <div class="form-group p-4" style="background: #f5f5f5">
                        <label for="" class="pr-5">Slider</label>
                        @include('layouts.gallery')
                    </div>

                    <div class="row" hidden>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Right Top Banner</label>
                                <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" data-show-loader="true" data-default-file="{{  url( strval($data['right_top_banner']) ) }}" name="right_top_banner" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Right Bottom Banner</label>
                                <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" data-show-loader="true" data-default-file="{{ url(strval($data['right_bottom_banner'])) }}" name="right_bottom_banner" />
                            </div>
                        </div>
                    </div>

                    <div class="row" hidden>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control mt-2 mb-2" placeholder="Text 1" name="text_1" value="{{ $data['text_1'] }}">
                                <input type="text" class="form-control mt-2 mb-2" placeholder="Text 3"  name="text_2" value="{{ $data['text_2'] }}">
                                <textarea class="form-control mt-2 mb-2" rows="3" placeholder="Text 3"  name="text_3">{{ $data['text_3'] }}</textarea>
                                <hr>
                                <input type="text" class="form-control mt-2 mb-2" placeholder="Button Text"  name="btn_text" value="{{ $data['btn_text'] }}">
                                <input type="url" class="form-control mt-2 mb-2" placeholder="Button Link" name="btn_link" value="{{ $data['btn_link'] }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="url" class="form-control mt-2 mb-2" placeholder="Youtube Video Link" name="video_link" value="{{ $data['video_link'] }}">
                            </div>
                        </div>
                    </div>












                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                </form>

            </div> <!-- end card-body-->
        </div>
    </div>
</div>

@endsection @section('js')

@endsection
