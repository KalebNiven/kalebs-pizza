@extends('layouts.app')

@section('content')

<style>
    td{
        vertical-align: middle !important;
    }
</style>


<div class="container px-5">
    <div class="row justify-content-center">
        <div class="col-md-10 text-center py-4">
            <img src="assets/images/cover.png" class="img-fluid br-10 w-100" alt="">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10 text-center">
            <h1 class="coloredText mb-0 display-4 fw-500 d-flex justify-content-center">Cart</h1>
            <span hidden="" class="alt_coloredText"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cart</font></font></span>
        </div>
    </div>
</div>


<!-- main -->

<div class="container px-5">
    <div class="row justify-content-center py-4">

       <form action="{{ route('cart.update',1) }}" method="POST" class="col-md-12"> @csrf @method('PATCH')
            <table class="table">
                <tr>
                    <th>X</th>
                    <th colspan="2">Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
                @foreach (Cart::getContent() as $item)
                    <tr>
                        <td>
                            <a href="{{ route('cart.destroy',$item->id) }}"><i class="fa text-danger fa-trash"></i></a>
                        </td>
                        <td><img src="{{ url($item->attributes['image']) }}" class="img-fluid" style="max-height: 70px" alt="" srcset=""></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <input type="number" class="form-control" name="qty[]" value="{{ $item->quantity }}" id="">
                            <input type="hidden" value="{{ $item->id }}" name="id[]">
                        </td>
                    </tr>
                @endforeach
            </table>
            <div style="text-align: center;">
                <a href="javascript:;" class="btn btn-danger py-3 mx-1" onclick="$(this).closest('form').submit()">Update Cart</a>
                <a href="{{ route('checkout.index') }}" class="btn btn-success py-3">Proceed To Checkout</a>
            </div>
       </form>
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
