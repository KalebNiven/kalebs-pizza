


<!-- Mirrored from myrathemes.com/delexa/layouts/blue-vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Aug 2020 10:53:29 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Delexa - Material Design Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{url('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('public/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('public/assets/css/theme.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>
 
    <div class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block bg-white shadow-lg rounded my-5">
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-login rounded-left"></div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <a href="index.html" class="d-block mb-5">
                                                <img src="assets/images/logo-dark.png" alt="app-logo" height="18" />
                                            </a>
                                        </div>
                                        <h1 class="h5 mb-1">Welcome Back!</h1>
                                        <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                                        <form class="user" method="POST" action="{{route('admin.forgot')}}"> @csrf
                                            @include('layouts.alerts')
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                            </div>
                                            
                                            <button type="submit" class="btn btn-success btn-block waves-effect waves-light">Send Password Reset Link </button>

                                            
                                            
                                        </form>

                                        <div class="row mt-4">
                                            <div class="col-12 text-center">
                                                <p class="text-muted mb-2"><a href="auth-recoverpw.html" class="text-muted font-weight-medium ml-1">Forgot your password?</a></p>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div> <!-- end .padding-5 -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- jQuery  -->
    <!-- jQuery  -->
    <script src="{{url('public/assets/js/jquery.min.js')}}"></script>
    <script src="{{url('public/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('public/assets/js/metismenu.min.js')}}"></script>
    <script src="{{url('public/assets/js/waves.js')}}"></script>
    <script src="{{url('public/assets/js/simplebar.min.js')}}"></script>

    <!-- App js -->
    <script src="{{url('public/assets/js/theme.js')}}"></script>

</body>


<!-- Mirrored from myrathemes.com/delexa/layouts/blue-vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Aug 2020 10:53:29 GMT -->
</html>