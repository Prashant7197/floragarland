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

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
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
        h1 {
            font-family: 'Lobster', cursive;
            font-size: 36px;
            margin-bottom: 4px;
            /* Adding cinematic text-shadow effect */
            text-shadow: 2px 2px 10px #4bd9e4;
            animation: textAnimation 3s ease-in-out alternate infinite;
        }
        .cinematic {
            font-size: 24px;
            text-shadow: 1px 1px 8px #054857;
            color: white;
            animation: textAnimation 3s cubic-bezier(0.22, 0.61, 0.36, 1) alternate infinite;
        }

        @keyframes textAnimation {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
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
                        <li class="nav-item"><a href="/logout" class="nav-link btn btn-primary">Logout</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <div class="hero-wrap ftco-degree-bg" style="background-image: url('/images/main_background.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-center align-items-center">
                <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
                    <div class="text text-center">
                        <h1 class="mb-4 cinematic-animation" style="font-family: 'Lobster', cursive;">The Best Way <br>to Find Marrige
                            Lawn & Stage Decorator</h1>
                        <p class="cinematic">
                            Our innovative website is designed to provide you with an exceptional experience, ensuring
                            that every milestone in your life is celebrated in style.</p>
                             <form form action="/lawns/search" method="post"class="search-location mt-md-5">
                        @csrf
                            <div class="row justify-content-center">
                                <div class="col-lg-10 align-items-end">
                                    <div class="form-group">
                                        <div class="form-field">
                                            <input type="text" class="form-control" name="search" placeholder="Search Lawn">
                                            <button type="submit"><span class="ion-ios-search"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mouse">
            <a href="#" class="mouse-icon">
                <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
            </a>
        </div>
    </div>

    {{-- <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Our Services</span>
                    <h2 class="mb-2">The smartest way to book lawns</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center"><span
                                class="flaticon-piggy-bank"></span></div>
                        <div class="media-body py-md-4">
                            <h3>No extra charges</h3>
                            <p>Browse through our extensive selection of lawns to find your perfect venue. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center"><span
                                class="flaticon-wallet"></span></div>
                        <div class="media-body py-md-4">
                            <h3>Afordable Price</h3>
                            <p> Connect with our friendly representative to discuss your requirements and finalize the details.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center"><span
                                class="flaticon-file"></span></div>
                        <div class="media-body py-md-4">
                            <h3>Availble lawn list</h3>
                            <p>Schedule a visit to the chosen lawn to ensure it meets your expectations. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center"><span
                                class="flaticon-locked"></span></div>
                        <div class="media-body py-md-4">
                            <h3>Asured for booking</h3>
                            <p>Once you're satisfied, secure your booking and get ready to create unforgettable memories at your chosen lawn.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <style>
        .servicebox {
            box-shadow: #bdbdbd 0 0 20px 1px;
            border-radius: 5px;
            padding: 5px;
            width: 100%;
        }

        .servicebox:hover {
            box-shadow: #bdbdbd 0 0 20px 10px;
            border-radius: 5px;
            padding: 5px;
        }
    </style>
    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Our Services</span>
                    <h2 class="mb-2">The smartest way to book lawns</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-4  col-12 mb-md-3 d-flex  align-self-stretch ftco-animate">
                    <div onclick="window.location='/lawns'" class="media block-6 servicebox services d-block text-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <img class="img-fluid"
                                src="https://images.pexels.com/photos/2060240/pexels-photo-2060240.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" />
                        </div>
                        <div class="media-body py-md-4">
                            <h2 style="font-family: 'Playfair Display';">Marriage</h2>

                        </div>
                    </div>
                </div>
                <div class="col-md-4  col-12 mb-md-3 d-flex  align-self-stretch ftco-animate">
                    <div onclick="window.location='/lawns'" class="media block-6 servicebox services d-block text-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <img class="img-fluid"
                                src="https://images.pexels.com/photos/305774/pexels-photo-305774.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" />
                        </div>
                        <div class="media-body py-md-4">
                            <h2 style="font-family: 'Playfair Display';">Anniversary</h2>

                        </div>
                    </div>
                </div>
                <div class="col-md-4  col-12 mb-md-3 d-flex  align-self-stretch ftco-animate">
                    <div onclick="window.location='/lawns'" class="media block-6 servicebox services d-block text-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <img class="img-fluid"
                                src="https://images.pexels.com/photos/2072181/pexels-photo-2072181.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" />

                        </div>
                        <div class="media-body py-md-4">
                            <h2 style="font-family: 'Playfair Display';">Birthday</h2>

                        </div>
                    </div>
                </div>
                <div class="col-md-4  col-12 mb-md-3 d-flex  align-self-stretch ftco-animate">
                    <div onclick="window.location='/lawns'" class="media block-6 servicebox services d-block text-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <img class="img-fluid" src="/images/ring_ceremony.jpg" />

                        </div>
                        <div class="media-body py-md-4">
                            <h2 style="font-family: 'Playfair Display';">Ring-Ceremony</h2>

                        </div>
                    </div>
                </div>
                <div class="col-md-4  col-12 mb-md-3 d-flex  align-self-stretch ftco-animate">
                    <div onclick="window.location='/lawns'" class="media block-6 servicebox services d-block text-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <img class="img-fluid"
                                src="https://plus.unsplash.com/premium_photo-1681841228192-0ec1412c232c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" />

                        </div>
                        <div class="media-body py-md-4">
                            <h2 style="font-family: 'Playfair Display';">Business Party</h2>

                        </div>
                    </div>
                </div>
                <div class="col-md-4  col-12 mb-md-3 d-flex  align-self-stretch ftco-animate">
                    <div onclick="window.location='/lawns'" class="media block-6 servicebox services d-block text-center">
                        <div class="d-flex justify-content-center align-items-center"><img class="img-fluid"
                                src="https://images.unsplash.com/photo-1587825140708-dfaf72ae4b04?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" />
                        </div>
                        <div class="media-body py-md-4">
                            <h2 style="font-family: 'Playfair Display';">Seminar</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section goto-here">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">What we offer</span>
                    <h2 class="mb-2">Exclusive Offer For You</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="property-wrap ftco-animate">
                        <a href="#" class="img"
                            style="background-image: url(https://img.theculturetrip.com/1440x/smart/wp-content/uploads/2023/02/raj-rana-x0eqcijnmf8-unsplash.jpg);"></a>
                        <div class="text">
                            {{-- <ul class="property_list">
        					<li><span class="flaticon-bed"></span>3</li>
        					<li><span class="flaticon-bathtub"></span>2</li>
        					<li><span class="flaticon-floor-plan"></span>1,878 sqft</li>
        				</ul> --}}
                            <h3><a href="#">Lake Palace</a></h3>
                            <span class="location">Udaipur</span>
                            <a href="#" class="d-flex align-items-center justify-content-center btn-custom">
                                <span class="ion-ios-link"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="property-wrap ftco-animate">
                        <a href="#" class="img"
                            style="background-image: url(https://img.theculturetrip.com/1440x807/smart/wp-content/uploads/2021/10/37eb8f15-e1636387794897.jpg);"></a>
                        <div class="text">

                            {{-- <ul class="property_list">
        					<li><span class="flaticon-bed"></span>3</li>
        					<li><span class="flaticon-bathtub"></span>2</li>
        					<li><span class="flaticon-floor-plan"></span>1,878 sqft</li>
        				</ul> --}}
                            <h3><a href="#">Jai Vilas Mahal</a></h3>
                            <span class="location">Kolkata</span>
                            <a href="#" class="d-flex align-items-center justify-content-center btn-custom">
                                <span class="ion-ios-link"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="property-wrap ftco-animate">
                        <a href="#" class="img"
                            style="background-image: url(https://img.theculturetrip.com/1440x807/smart/wp-content/uploads/2017/10/architecture-639103_1280.jpg);"></a>
                        <div class="text">
                            {{-- <ul class="property_list">
        					<li><span class="flaticon-bed"></span>3</li>
        					<li><span class="flaticon-bathtub"></span>2</li>
        					<li><span class="flaticon-floor-plan"></span>1,878 sqft</li>
        				</ul> --}}
                            <h3><a href="#">Umaid Bhawan Palace</a></h3>
                            <span class="location">Jaipur</span>
                            <a href="#" class="d-flex align-items-center justify-content-center btn-custom">
                                <span class="ion-ios-link"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .services.services-2 .icon span {
            color: #ff008d;
        }

        .services.services-2 .icon {
            background: #ffffff;
        }
    </style>
    <section class="ftco-section ftco-degree-bg services-section img mx-md-5"
        style="background-image: url(/images/pexels-vidal-balielo-jr-14457444.jpg);">
        <div class="overlay" style="background-color: #ff2be5b3;"></div>
        <div class="container">
            <div class="row justify-content-start mb-md-0 mb-5">
                <div class="col-md-6 text-center heading-section heading-section-white ftco-animate">
                    <span class="subheading">Work flow</span>
                    <h2 class="mb-0" style="font-size: 60px;">How it works</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services services-2">
                                <div class="media-body py-md-4 text-center">
                                    <div class="icon mb-3 d-flex align-items-center justify-content-center">
                                        <span>01</span>
                                    </div>
                                    <h3>Find your Lawn</h3>
                                    <p>Browse through our extensive selection of lawns to find your perfect venue for
                                        your Memories. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services services-2">
                                <div class="media-body py-md-4 text-center">
                                    <div class="icon mb-3 d-flex align-items-center justify-content-center">
                                        <span>02</span>
                                    </div>
                                    <h3>Deal with representative</h3>
                                    <p>Connect with our friendly representative to discuss your requirements and
                                        finalize the details. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services services-2">
                                <div class="media-body py-md-4 text-center">
                                    <div class="icon mb-3 d-flex align-items-center justify-content-center">
                                        <span>03</span>
                                    </div>
                                    <h3>Visit Lawn</h3>
                                    <p>Schedule a visit to the chosen lawn to ensure it meets your expectations. We
                                        allways ready to for... </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services services-2">
                                <div class="media-body py-md-4 text-center">
                                    <div class="icon mb-3 d-flex align-items-center justify-content-center">
                                        <span>04</span>
                                    </div>
                                    <h3>Book Your Lawn</h3>
                                    <p>Once you're satisfied, secure your booking and get ready to create unforgettable
                                        memories at your chosen lawn.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
                    style="background-image: url(https://images.pexels.com/photos/306066/pexels-photo-306066.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);">
                </div>
                <div class="col-md-6 wrap-about py-md-5 ftco-animate">
                    <div class="heading-section p-md-5">
                        <h2 class="mb-4">Beyond your expectations</h2>

                        <p>‘Floralgarland Pvt. Ltd.’ gives key event arranging and innovative conveyance of gatherings and
                            events for functions including Wedding, Anniversary, Birthday Party, Ring Ceremony, Business
                            Party, Seminar and many more Parties.

                        </p>

                        <p>Floralgarland provide facilities for booking stage decoration in simple way at Affordable price. we insure for
                            fully Hassle free asured booking and save your time and money.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="ftco-counter img" id="section-counter">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 py-4 mb-4">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="15">0</strong>
                            <span>Lawn Attached</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 py-4 mb-4">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="45">0</strong>
                            <span>Total <br>Events</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 py-4 mb-4">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="50">0</strong>
                            <span>Satisfied <br>Clients</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}

    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Testimonial</span>
                    <h2 class="mb-3">Happy Clients</h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        @foreach ($feedbacks as $feedback)
                            <div class="item">
                                <div class="testimony-wrap py-4">
                                    <div class="text">
                                        <p class="mb-4">{{ $feedback->feedback }}</p>
                                        <div class="d-flex align-items-center">
                                            <div class="user-img"
                                                style="background-image: url(/images/feedback/{{ $feedback->profile }})">
                                            </div>
                                            <div class="pl-3">
                                                <p class="name">{{ $feedback->name }}</p>
                                                <span class="position">{{ $feedback->description }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-agent ftco-no-pt pb-0 mb-0">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Agents</span>
                    <h2 class="mb-4">Our Agents</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($agents as $agent)
                    <div class="col-md-3 ftco-animate">
                        <div class="agent">
                            <div class="img">
                                <img src="/images/agent/{{ $agent->profile }}" class="img-fluid">
                            </div>
                            <div class="desc">
                                <h3>{{ $agent->name }}</h3>
                                <p class="h-info"><span class="location">{{ $agent->designation }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>


    {{-- <section class="ftco-section ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Blog</span>
                    <h2>Recent Blog</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <div class="text">
                            <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a>
                            </h3>
                            <div class="meta mb-3">
                                <div><a href="#">July. 24, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <a href="blog-single.html" class="block-20 img"
                                style="background-image: url('images/image_1.jpg');">
                            </a>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <div class="text">
                            <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a>
                            </h3>
                            <div class="meta mb-3">
                                <div><a href="#">July. 24, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <a href="blog-single.html" class="block-20 img"
                                style="background-image: url('images/image_2.jpg');">
                            </a>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <div class="text">
                            <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a>
                            </h3>
                            <div class="meta mb-3">
                                <div><a href="#">July. 24, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <a href="blog-single.html" class="block-20 img"
                                style="background-image: url('images/image_3.jpg');">
                            </a>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <div class="text">
                            <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a>
                            </h3>
                            <div class="meta mb-3">
                                <div><a href="#">July. 24, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <a href="blog-single.html" class="block-20 img"
                                style="background-image: url('images/image_4.jpg');">
                            </a>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <footer class="py-2">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">

                        <h2 class="ftco-heading-2"><img src="/images/flora.png" height="100px" widht="120px"></h2>
                        <p>Our innovative website is designed to provide you with an exceptional experience, ensuring
                            that every milestone in your life is celebrated in style. </p>
                        <ul class="ftco-footer-social list-unstyled mt-5">
                            {{-- <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li> --}}
                            <li class="ftco-animate"><a href="{{ env('facebook') }}"><span
                                        class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="{{ env('instagram') }}"><span
                                        class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">About Us</h2>
                        <ul class="list-unstyled">

                            <li><a href="/about"><span class="icon-long-arrow-right mr-2"></span>About Us</a></li>
                            <li><a href="/contact"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>

                            <li><a href="/lawns"><span class="icon-long-arrow-right mr-2"></span>Search
                                    Lawn</a></li>
                            <li><a href="/agents"><span class="icon-long-arrow-right mr-2"></span>For Agents</a></li>
                            <li><a href="/privacy"><span class="icon-long-arrow-right mr-2"></span>Privacy Policy</a>
                            </li>
                            <li><a href="/terms"><span class="icon-long-arrow-right mr-2"></span>Terms and
                                    Condition</a></li>
                            <li><a href="/refund"><span class="icon-long-arrow-right mr-2"></span>Refund and
                                    Cancelation policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">S9/92 kh Pandeypur
                                        Varanasi Uttar Pradesh 221007</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+91
                                            8687883338</span></a><a href="#"><span
                                            class="icon icon-phone"></span><span class="text">+91
                                            6392420306</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope pr-4"></span><span
                                            class="text">info@floralgarland.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>





    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
