
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="" name="description" />
    <meta content="" name="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <!-- App css -->
    <link href="{{url('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('public/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('public/assets/css/theme.min.css')}}" rel="stylesheet" type="text/css" />

 <!-- Plugins css -->
     <link href="{{url('public/plugins/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{url('public/plugins/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{url('public/plugins/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{url('public/plugins/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{url('public/plugins/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />

     <script src="{{url('public/assets/js/jquery.min.js')}}"></script>

     <script>
     let base_url = "{{url('/')}}/";
     </script>

     <style>
         .alert-success {
            color: #ffffff;
            text-transform: capitalize;
            background-color: #006f3d;
            border-color: #c6f0de;
        }
     </style>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <!-- LOGO -->
                <div class="navbar-brand-box d-flex align-items-left">
                    <a href="index.html" class="logo">
                        <span>
                            <img src="{{ url(session('setting')['footer_logo']) }}" alt="" height="18">
                        </span>
                        <i>
                            <img src="{{ url(session('setting')['footer_logo']) }}" alt="" height="24">
                        </i>
                    </a>

                    <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect waves-light" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="d-flex align-items-center">





                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn header-item waves-effect waves-light" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span style="text-transform: capitalize">{{ auth()->user()->name }}</span>
                            <span class="d-none d-sm-inline-block ml-1"></span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">

                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('admin.profile.create') }}">
                                <span>Profile</span>
                                                      </a>

                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('admin.setting.create') }}">
                                <span>Setting</span>
                                                            </a>


                            <a href="{{ route('admin.logout') }}" class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span>Log Out</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="{{ route('admin.index') }}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-book-open-page-variant"></i><span>Category</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.category.create') }}">Create New</a></li>
                                <li><a href="{{ route('admin.category.index') }}">Manage</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-book-open-page-variant"></i><span>Product</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.product.create') }}">Create New</a></li>
                                <li><a href="{{ route('admin.product.index') }}">Manage</a></li>
                            </ul>
                        </li>


                        <li>
                            <a href="{{ route('admin.home-page.create') }}" class="waves-effect"><i class="mdi mdi-book-open-page-variant"></i><span>Home Page</span></a>
                        </li>

                        <li >
                            <a href="{{ route('admin.order') }}" class="waves-effect"><i class="mdi mdi-book-open-page-variant"></i><span>Orders</span></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.profile.create') }}" class="waves-effect"><i class="mdi mdi-book-open-page-variant"></i><span>Admin Profile</span></a>
                        </li>

                        {{-- <li class="menu-title">Components</li> --}}



                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid  " style="position: relative">
                <div style="position: absolute;right: 20%;left: 20%;top: -15px;z-index: 1">
                    @include('layouts.alerts')
                </div>
                   @yield('content')

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">


                    </div>
                </div>
            </footer>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Overlay-->
    <div class="menu-overlay"></div>


    <!-- jQuery  -->

    <script src="{{url('public/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('public/assets/js/metismenu.min.js')}}"></script>
    <script src="{{url('public/assets/js/waves.js')}}"></script>
    <script src="{{url('public/assets/js/simplebar.min.js')}}"></script>

    <!-- third party js -->
    <script src="{{url('public/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('public/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{url('public/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('public/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{url('public/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('public/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{url('public/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{url('public/plugins/datatables/buttons.flash.min.js')}}"></script>
    <script src="{{url('public/plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{url('public/plugins/datatables/dataTables.keyTable.min.js')}}"></script>
    <script src="{{url('public/plugins/datatables/dataTables.select.min.js')}}"></script>
    <script src="{{url('public/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{url('public/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{url('public/plugins/dropify/dropify.min.js')}}"></script>

    <!-- App js -->
    <script src="{{url('public/assets/js/theme.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('.dropify').dropify();
        });
    </script>
    @yield('js')
</body>

</html>
