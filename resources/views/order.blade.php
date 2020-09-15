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
            <h1 class="coloredText mb-0 display-4 fw-500 d-flex justify-content-center">My Account</h1>
        </div>
    </div>
</div>


<!-- main -->

<div class="container px-5">
    <div class="row justify-content-center py-4">

        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item " style="text-transform: capitalize"><a href="{{ route('account') }}">{{ auth()->user()->name }}</a></li>
                <li class="list-group-item">My Orders</li>
                <li class="list-group-item"><a href="{{ route('profile') }}">Edit Profile</a></li>
                <li class="list-group-item"><a href="{{ route('logout') }}">Logout</a></li>
                <li class="list-group-item"><a href="{{ route('home') }}">Continue Shopping</a></li>
              </ul>
        </div>
        <div class="col-md-8">
            <table class="table table-sm">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th></th>
                </tr>
               @foreach ($table as $k=>$item)
                   <tr>
                       <td>{{ $item->id }}</td>
                       <td>{{ $item->created_at }}</td>
                       <td >
                        <div id="accordion{{ $item->id }}" style="width: 400px;">
                            <div class="card">
                                <div class="card-header" id="headingOne{{ $item->id }}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{ $item->id }}" aria-expanded="true"
                                            aria-controls="collapseOne{{ $item->id }}">
                                            Details
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne{{ $item->id }}" class="collapse " aria-labelledby="headingOne{{ $item->id }}" data-parent="#accordion{{ $item->id }}">
                                    <div class="card-body">
                                        <table class="table table-sm">
                                        <tr>
                                            <th>Product</th>
                                            <th>Qty.</th>
                                            <th>Price</th>
                                            <th>Amount</th>
                                        </tr>
                                       @foreach ($item->log as $i)

                                               <tr>
                                                   <td>{{ $i->product_name }}</td>
                                                   <td>{{ $i->quantity }}</td>
                                                   <td>{{ $i->price }}</td>
                                                   <td>{{ $i->price * $i->quantity }}</td>
                                               </tr>

                                       @endforeach
                                    </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                       </td>
                   </tr>
               @endforeach

            </table>
            {{ $table->links() }}
        </div>

    </div>
</div>


@endsection
@section('js')

<script>

</script>

@endsection
