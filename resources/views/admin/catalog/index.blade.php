@extends('layouts.admin-app')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Catalog</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.catalog.create')}}">Create New</a></li>
                    <li class="breadcrumb-item active">Manage</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table mb-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Catalog</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- end card-body-->
        </div>
        <!-- end card -->

    </div>
</div>

@endsection @section('js')

<script>
        $(document).ready(function(){
            $('#dataTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    // 'excel',
                    // 'csv',
                    // {
                    //     extend: 'print',
                    //     exportOptions: {
                    //         columns: ':visible'
                    //     },
                    // },
                    // 'colvis'
                ],
                processing: true,
                serverSide: true,
                ajax:{
                    url: "{{ url()->current() }}?ajax=1",
                    dataType: "json",
                    type: "GET",
                    data:{ _token: "{{csrf_token()}}"}
                },
                columns: [
                    { data: "id" },
                    { data: "name" },
                    {
                        sortable: false,
                        "render": function ( data, type, full, meta ) {
                               return '<form action="catalog/'+full.id+'/edit" method="get">' +
                                '<button type="submit" class="btn btn-sm btn-dark"><i class="fa fa-edit"></i></button>' +
                                '</form>';
                        }
                    },
                    {
                        sortable: false,
                        "render": function ( data, type, full, meta ) {
                            return '<form action="catalog/'+full.id+'" method="post">' +
                                '@method("DELETE")'+
                                '@csrf'+
                                '<button type="submit" class="btn btn-sm btn-danger"><i class="fa  fa-trash"></i></button>' +
                                '</form>';
                        }
                    }
                ],
                columnDefs: [
                    // {
                    //     "targets": [ 2 ],
                    //     "visible": true,
                    //     "searchable": false
                    // },
                    // {
                    //     "targets": [ 3 ],
                    //     "visible": true,
                    //     "searchable": false
                    // },


                 ],
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
            } );
        });
    </script>


@endsection
