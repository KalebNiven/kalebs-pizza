@extends('layouts.app')

@section('content')




<div class="container px-5">
    <div class="row justify-content-center">
        <div class="col-md-10 text-center py-4">
            <img src="assets/images/cover.png" class="img-fluid br-10 w-100" alt="">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10 text-center">
            <h1 class="coloredText mb-0 display-4 fw-500 d-flex justify-content-center">{{ $product->name }}</h1>
            <span hidden="" class="alt_coloredText"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $product->name }}</font></font></span>
        </div>
    </div>
</div>


<!-- main -->

<div class="container px-5">
    <div class="row justify-content-center py-4">
       <div class="col-md-6">
           <img src="{{ url($product->thumbnail) }}" class="img-fluid" alt="" style="max-height: 450px;">
       </div>
       <div class="col-md-6 border-left card" style="padding-top: 85px;">
            <table class="table">
                <tr>
                    <td>Product</td>
                    <td>:</td>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                        <td>Category</td>
                        <td>:</td>
                        <td>@if($product->category) {{ $product->category['name'] }} @endif</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>:</td>
                        <td>{{ $product->price }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>:</td>
                        <td>{{ $product->description }}</td>
                    </tr>
            </table>
            <form action="" style="display: flex">
                <input value="1" min="1" max="10" type="number" class="form-control">
                <button type="submit" class="btn btn-danger py-3">Add To Cart</button>
            </form>
       </div>
    </div>
</div>

 <!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

@endsection
@section('js')

<script>
    $(document).ready(function() {
        $(document).on('click', '.show_modal', function() {
            $("#myModal .modal-body").html('<iframe width="100%" height="400" src="https://www.youtube.com/embed/'+$(this).attr('data-video')+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
            $('#myModal').modal('show');
        });
        $('#myModal').on('hidden.bs.modal', function () {
            $("#myModal .modal-body").html(null);
        });
    });
</script>

@endsection
