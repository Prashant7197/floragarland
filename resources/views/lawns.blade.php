@extends('layout.mainlayout')
@section('main')
    <!-- END nav -->
    <script>
        document.getElementById("lawnnav").classList.add('active');
    </script>
    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight"
        style="background-image: url('https://images.pexels.com/photos/169193/pexels-photo-169193.jpeg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread" style="font-family: 'Lobster', cursive;">Choose <br>Your Desired Lawn</h1>

                    <form action="/lawns/search" method="post" class="search-location mt-md-5">
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
            <div class="mouse">
                <a href="#" class="mouse-icon">
                    <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
                </a>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <style>
                    .card-custom {
                        overflow: hidden;
                        min-height: 450px;
                        box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
                    }

                    .card-custom-img {
                        height: 200px;
                        min-height: 200px;
                        background-repeat: no-repeat;
                        background-size: cover;
                        background-position: center;
                        border-color: inherit;
                        border-radius: 0px 30px 0px 30px;
                    }

                    /* First border-left-width setting is a fallback */
                    .card-custom-img::after {
                        position: absolute;
                        content: '';
                        top: 161px;
                        left: 0;
                        width: 0;
                        height: 0;
                        border-style: solid;
                        border-top-width: 40px;
                        border-right-width: 0;
                        border-bottom-width: 0;
                        border-left-width: 545px;
                        border-left-width: calc(575px - 5vw);
                        border-top-color: transparent;
                        border-right-color: transparent;
                        border-bottom-color: transparent;
                        border-left-color: inherit;
                    }

                    .card-custom-avatar img {
                        border-radius: 50%;
                        box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
                        position: absolute;
                        top: 100px;
                        left: 1.25rem;
                        width: 100px;
                        height: 100px;
                    }
                </style>

                @foreach ($lawns as $lawn)
                    <div class="col-md-6 col-lg-4 pb-3">

                        <!-- Copy the content below until next comment -->
                        <div class="card card-custom bg-white border-white border-0" onclick="window.location='/lawn/{{ $lawn->id }}'">

                            <img class="img-fluid card-custom-img" style="" src="/{{ explode(',', $lawn->images)[0] }}"
                                alt="Avatar" />

                            <div class="card-body" style="overflow-y: auto">
                                <h4 class="card-title" style="font-weight: bold;">{{ $lawn->name }} </h4>
                                <p style="font-weight: bold;"><img src="/images/placeholder.png" height="25px" width="25px">&nbsp;<span style="font-weight: bold; color: #255485;">Place: </span> {{$lawn->locality}}</p> {!! $lawn->specification !!}
                                
                            </div>
                            <div class="card-footer" style="background: inherit; border-color: inherit;">
                                <a href="/lawn/{{ $lawn->id }}" class="btn btn-primary">Book Now</a>

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
            {{-- <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
@endsection
