<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="utf-8">

    <link rel="icon" type="image/x-icon" href="/images/flora.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="/https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tangerine&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/css/animate.css">

    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">

    <link rel="stylesheet" href="/css/aos.css">

    <link rel="stylesheet" href="/css/ionicons.min.css">

    <link rel="stylesheet" href="/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/css/jquery.timepicker.css">


    <link rel="stylesheet" href="/css/flaticon.css">
    <link rel="stylesheet" href="/css/icomoon.css">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        .heading-section h2 {
            font-family: 'Tangerine', cursive;
            font-size: 60px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
        <a class="navbar-brand" href="/index" style="position: relative; display: inline-block;">
            <img src="/images/flora.png" class="logo" style="
                -webkit-filter: drop-shadow(5px 5px 5px white);
                filter: drop-shadow(3px 2px 2px black);
                display: block;
            ">
            <span style="
                position: absolute;
                top: 50%;
                left: 90%;
                transform: translateY(-50%);
                font-family: 'Cinzel', serif;
                font-size: 32px;
                font-weight: bold;
                color: gold;
                text-shadow: 2px 2px 4px #000;
                white-space: nowrap;
            ">Floral Garland</span>
            </a>

            <!-- Add this to your <head> section to load the Cinzel font -->
            <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span>
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" id="homenav"><a href="/" class="nav-link">Home</a></li>
                    <li class="nav-item" id="aboutnav"><a href="/about" class="nav-link">About</a></li>
                    <li class="nav-item" id="agentnav"><a href="/agents" class="nav-link">Agent</a></li>
                    <li class="nav-item" id="servicenav"><a href="/services" class="nav-link">Services</a></li>
                    <li class="nav-item" id="lawnnav"><a href="/lawns" class="nav-link">Lawns</a></li>
                    @if (!Auth::guard('customer')->check())
                        <li class="nav-item"><a href="/login" class="nav-link btn btn-primary">Login</a></li>
                        <li class="mx-md-3 nav-item"><a href="/register" class="nav-link btn btn-info">Register</a></li>
                    @else
                    
                    {{-- <li class="nav-item"><a href="/myprofile" class="nav-link ">Profile</a></li> --}}
                    <li class="nav-item" id="bookingnav"><a href="/mybooking" class="nav-link ">Bookings</a></li>
                    <li class="nav-item" ><a href="/logout" class="nav-link btn btn-primary">Logout</a></li>
                        
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="tab1Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
    </div>

    <script>
        $('#navId a').click(e => {
            e.preventDefault();
            $(this).tab('show');
        });
    </script>
