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
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.setting.store') }}" method="post" enctype="multipart/form-data"> @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend" >
                                <span class="input-group-text" id="email"><i class="feather-mail"></i></span>
                            </div>
                            <input type="email" class="form-control" autocomplete="off" placeholder="Email Address" aria-label="email" aria-describedby="email" name="email" value="{{ $data['email'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend" >
                                <span class="input-group-text" id="contact"><i class="feather-phone"></i></span>
                            </div>
                            <input type="tel" class="form-control" autocomplete="off" placeholder="Contact Number" aria-label="contact" aria-describedby="contact" name="contact" value="{{ $data['contact'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend" >
                                <span class="input-group-text" id="facebook_link"><i class="feather-facebook"></i></span>
                            </div>
                            <input type="url" class="form-control" placeholder="Facebook Link" aria-label="facebook_link" aria-describedby="facebook_link" name="facebook_link" value="{{ $data['facebook_link'] }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="twitter_link"><i class="feather-twitter"></i></span>
                            </div>
                            <input type="url" class="form-control" placeholder="Twitter Link" aria-label="twitter_link" aria-describedby="twitter_link" name="twitter_link" value="{{ $data['twitter_link'] }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="linkedin_link"><i class="feather-linkedin"></i></span>
                            </div>
                            <input type="url" class="form-control" placeholder="Linkedin Link" aria-label="linkedin_link" aria-describedby="linkedin_link" name="linkedin_link" value="{{ $data['linkedin_link'] }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="instagram_link"><i class="feather-instagram"></i></span>
                            </div>
                            <input type="url" class="form-control" placeholder="Instagram Link" aria-label="instagram_link" aria-describedby="instagram_link" name="instagram_link" value="{{ $data['instagram_link'] }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Header Logo</label>
                                <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" data-show-loader="true" data-default-file="{{ url($data['header_logo']) }}" name="header_logo"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Footer Logo</label>
                                <input type="file" class="dropify" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" data-show-loader="true" data-default-file="{{ url($data['footer_logo']) }}" name="footer_logo"/>
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
