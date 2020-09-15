@extends('layouts.app')

@section('content')



<!-- slider and banner -->
<div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @if($home->thumbnail)
            @php($slides = explode(',' , $home->thumbnail))
            @foreach($slides as $k=>$i)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $k }}" class=" @if($k==1) active @endif"></li>
            @endforeach
            @endif
        </ol>
        <div class="carousel-inner">
            @if($home->thumbnail)
            @php($slides = explode(',',$home->thumbnail))
            @foreach($slides as $k=>$i)
            @php($img = App\Gallery::find($i))
            <div class="carousel-item   @if($k==1) active @endif">
                <img src="{{ $img['path'] }}" class="img-fluid d-block w-100 " alt="...">
            </div>
            @endforeach
            @endif
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>



<!-- product -->
<div class="container px-md-5 py-5" id="menu">
    <div class="row px-md-5">

        <div class="col-md-12 text-center pb-2">
            <h1 class="mb-0">Our <span class="text-danger">Product</span> </h1>
        </div>

        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-1">
                    <div class="border-line"></div>
                </div>
            </div>
        </div>

        @foreach ($products as $p)
        <div class="col-md-3 col-sm-6 col-6 mt-3 mb-3">
            <a href="{{ url( 'product/'. str_replace(' ','-',strtolower($p->name)) ."/".  $p->id  ) }}">
                <div class="card p-3 ">
                    <div class="bg-white h-190 d-flex align-items-center justify-content-center">
                        <img src="{{ $p->thumbnail }}" class="img-fluid" alt="...">
                    </div>
                    <div class="card-body p-0 text-center mt-2">
                        <h6 class="card-title text-dark fw-600 fs-18">{{ $p->name }}</h6>
                        <h6 class="card-title text-danger fw-600 fs-18">${{ $p->price }}</h6>
                        <a href="javascript:;" data-id="{{ $p->id }}" class=" add_to_cart btn btn-danger btn-sm br-25 view-btn">
                            <i class="fa fa-cart-plus"></i> Add To Cart
                        </a>
                    </div>
                </div>
            </a>
        </div>
        @endforeach

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
           <h1 class="text-center" style="padding-top: 9px;">Added To Cart</h1>
    </div>
  </div>
</div>

@endsection


@section('js')

<script>
    $(document).ready(function(){
        $(document).on('click','.add_to_cart',function(){
            $.ajax({
                url:"{{ route('cart.store') }}",
                type:"post",
                data:{
                    id :$(this).attr('data-id'),
                    qty:1,
                    _token:"{{ csrf_token() }}"
                },
                beforeSend:function(){

                },
                complete:function(){
                    $("#exampleModal").modal('show');
                }
            });
        });
    });
</script>

@endsection
