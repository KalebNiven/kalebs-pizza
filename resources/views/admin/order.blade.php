@extends('layouts.admin-app')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Order</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table mb-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Country</th>
                                <th>city</th>
                                <th>State</th>
                                <th>Zip Code</th>
                                <th>Date</th>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($table as $k=>$item)
                   <tr>
                       <td>{{ $item->id }}</td>
                       <td>{{ $item->created_at }}</td>
                       <td>{{ $item->name }}</td>
                       <td>{{ $item->email }}</td>
                       <td>{{ $item->contact }}</td>
                       <td>{{ $item->country }}</td>
                       <td>{{ $item->city }}</td>
                       <td>{{ $item->state }}</td>
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
                        </tbody>
                    </table>
                    {{ $table->links() }}
                </div>

            </div>
            <!-- end card-body-->
        </div>
        <!-- end card -->

    </div>
</div>

@endsection @section('js')

@endsection
