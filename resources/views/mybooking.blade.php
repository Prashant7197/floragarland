@extends('layout.mainlayout')
@section('main')
    <script>
        document.getElementById("bookingnav").classList.add('active');
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight"
        style="background-image: url('/images/aboutusbg.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">

                    <h1 class="mb-3 bread"
                        style="font-family: 'Abril Fatface', cursive;
            font-size: 60px;color:red;">My Bookings
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row no-gutters">

                @foreach ($mybookings as $item)
                    <div class="card my-3">
                        <div class="row">
                            <div class="col-md-3">

                                <img class="card-img-top" src="{{ explode(',', $item->images)[0] }}" alt="">
                            </div>
                            <div class="col-md-5">
                                <h3>{{ $item->name }}</h3>
                                {{ $item->locality }}<br />
                                Description:<span>{{ $item->locality }}</span>

                            </div>
                            <div class="col-md-4">
                                <h3>Booking </h3>
                                Name:<span>{{ $item->booking_name }}</span><br/>
                                Email:<span>{{ $item->booking_email }}</span><br/>
                                Mobile:<span>{{ $item->booking_contact }}</span><br/>
                                Booked at:<span>{{ $item->booking_at }}</span><br/>
                                Booking for:<span>{{ $item->booking_date }}</span>
                               
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
