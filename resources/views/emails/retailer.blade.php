<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaleb's Pizza</title>

    <!-- stylesheet , fontawesome and googlefonts -->

    <link href="{{url('public/web/assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{url('public/web/assets/css/style.css')}}" rel="stylesheet"/>
    <link href="{{url('public/web/assets/css/query.css')}}" rel="stylesheet"/>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <link rel="stylesheet" href="{{url('public/web/assets/plugin/font-awesome-4.7.0/css/font-awesome.css')}}">


    <!-- flag -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.1/css/flag-icon.min.css">

    <style>
        td,th{
            text-align: left !important;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('home') }}">
                    <img src="{{ url(session('setting')['header_logo']) }}" class="img-fluid" alt="">
                </a>
            </div>
            <div class="col-12">
                <h2>New Retailer Request.</h2>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 250px;">Retailer Name</th>
                        <td>{{ $r_name }}</td>
                    </tr>
                    <tr>
                        <th>Conpany Name</th>
                        <td>{{ $r_company }}</td>
                    </tr>
                    <tr>
                        <th>Mobile Contact</th>
                        <td>{{ $r_contact }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $r_email }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $r_address }}</td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td>{{ $r_message }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


    <footer style="background: #d7222b;height: 60px;"></footer>
</body>
</html>
