<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiddies - Index</title>

    <!-- stylesheet , fontawesome and googlefonts -->

    <link href="{{url('public/web/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{url('public/web/assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{url('public/web/assets/css/query.css')}}" rel="stylesheet" />
    <link href="{{url('public/web/plugins/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <link rel="stylesheet" href="{{url('public/web/assets/plugin/font-awesome-4.7.0/css/font-awesome.css')}}">


    <!-- flag -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.1/css/flag-icon.min.css">

    <script src="{{url('public/web/assets/js/jquery.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <style>
        .goog-te-banner-frame {
            display: none !important;
        }
    </style>
</head>

<body>


    <!-- topbar -->

    <div class="container px-md-5">
        <div class="row pt-3 pb-1">
            <div class="col-md-12 col-sm-12 text-center">
                <a href="{{ route('home') }}">
                    <img src="{{ url(session('setting')['header_logo']) }}" style="max-height: 100px;" class="img-fluid" alt="">
                </a>
            </div>



        </div>
    </div>


    <!-- navbar -->

    <nav class="navbar navbar-expand-md navbar-dark bg-kiddies py-0">

        <!-- <a href="javascript:void(0)" onclick="closeNav()">
            <i class="fa fa-bars text-white" aria-hidden="true"></i>
        </a> -->
        <span class="d-md-none d-sm-block d-lg-none d-block" style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-bars text-white"></i></span>

        <div class="collapse navbar-collapse justify-content-center" id="navbarsExample03">
            <ul class="navbar-nav">
                <li class="nav-item px-4">
                    <a class="nav-link fs-20 text-white" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item px-4 ">
                    <a href="{{ route('home') }}#menu" class="nav-link fs-20 text-white">Menu</a>
                </li>
                <li class="nav-item px-4 ">
                    <a class="nav-link fs-20 text-white" href="{{ route('cart.index') }}">Cart</a>
                </li>

                @if(Auth::check())
                    <li class="nav-item px-4 ">
                        <a class="nav-link fs-20 text-white" href="{{ route('account') }}">My Account</a>
                    </li>
                @else
                    <li class="nav-item px-4 ">
                        <a class="nav-link fs-20 text-white" href="{{ route('login') }}">Account Login</a>
                    </li>
                @endif

            </ul>
        </div>
    </nav>

    <!-- mobile-menu -->

    <div id="mySidenav" class="sidenav bg-kiddies">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{ route('home') }}">Home</a>
        <a href="javascript:;">Menu</a>
        <a href="{{ route('cart.index') }}">Cart</a>
    </div>

    <div style="min-height: 500px;">
    @yield('content')
    </div>
    <!-- Footer -->
    <div class="container-fluid bg-black px-5">
        <div class="row px-5 justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <footer class="page-footer font-small indigo">

                            <div class="container text-center text-md-left">

                                <div class="row">

                                    <div class="col-md-12 text-center pt-4 pb-3 pl-0">
                                            <img src="{{ url(session('setting')['footer_logo']) }}" class="img-fluid" alt="">

                                    </div>

                                </div>

                            </div>

                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- footer-bar -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="footer-copyright text-center py-2 text-white bg-bar fs-14 fw-200">All rights reserved 2020
                </div>
            </div>
        </div>
    </div>






    <script src="{{url('public/web/assets/js/poper.js')}}"></script>
    <script src="{{url('public/web/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('public/web/assets/js/custom.js')}}"></script>
    <script src="{{url('public/web/plugins/switchery/switchery.min.js')}}"></script>
    @yield('js')


    <script>
        $(document).ready(function() {
            //rc();



            $(document).on('click', '._lang', function() {
                changeLanguageByButtonClick($(this).attr('data-lang'));
                console.clear();
                console.log('lang changed.');
                $('._lang_toggle').html($(this).html());
            });
        });
    </script>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: "en"
            }, 'google_translate_element');
        }

        function changeLanguageByButtonClick(language) {
            var selectField = document.querySelector("#google_translate_element select");
            for (var i = 0; i < selectField.children.length; i++) {
                var option = selectField.children[i];
                // find desired langauge and change the former language of the hidden selection-field
                if (option.value == language) {
                    selectField.selectedIndex = i;
                    // trigger change event afterwards to make google-lib translate this side
                    selectField.dispatchEvent(new Event('change'));
                    break;
                }
            }
             rc();
        }

        function rc(){
            let text = "";
            let chars  = $(".alt_coloredText font:last").html().split("");
            let colors = ["#d7212b","#47c7d9","#f9c412"];
            $.each(chars, function(i,v){
                if(v==" "){
                    text += "&nbsp;";
                }
                text += ("<span style='color:"+colors[Math.floor(Math.random() * colors.length)]+"' >"+v+"</span>")
            });
            $(".coloredText").html(text);
            $("body").css("margin-top","-40px");


        }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>
