@extends('layouts.app')

@section('content')




    <!-- cover-img -->


    <div class="container px-5">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center py-4">
                <img src="assets/images/cover.png" class="img-fluid br-10 w-100" alt="">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                
                <h1 class="coloredText mb-0 display-4 fw-500 d-flex justify-content-center">Brand</h1>
                <span hidden="" class="alt_coloredText"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Brand</font></font></span>
            </div>
        </div>
    </div>




    <!-- brand-products -->

    <div class="container px-5">
        <div class="row justify-content-center">
            <div class="col-md-10 px-0 py-3">
                <div class="row">
                    @foreach ($brands as $item)
                    <div class="col-md-3">
                        <div class="card p-3 bg-gray">
                                <div class="bg-white h-190 d-flex align-items-center justify-content-center">
                                    <img src="{{$item->thumbnail}}"  class="img-fluid" style="height: 130px;width: 150px" alt="...">
                                </div>
                            <div class="card-body p-0 text-center mt-2">
                              <h6 class="card-title fw-600 fs-18">{{ $item->name }}</h6>
                              <a href="{{ route('catalog') }}?dir=brand&i={{ $item->id }}" class="btn btn-danger btn-sm br-25 view-btn">
                                  View More
                              </a>
                            </div>
                          </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>



@endsection
