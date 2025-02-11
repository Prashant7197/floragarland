@extends('layout.mainlayout')
@section('main')
    <script>
        document.getElementById("aboutnav").classList.add('active');
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight"
        style="background-image: url('/images/aboutusbg.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>About us <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread"
                        style="font-family: 'Abril Fatface', cursive;
            font-size: 60px;color:red;">About Us</h1>
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

                        <p>‘Wedsla Pvt. Ltd.’ gives key event arranging and innovative conveyance of gatherings and
                            events for functions including Wedding, Anniversary, Birthday Party, Ring Ceremony, Business
                            Party, Seminar and many more Parties<b>.</b></p>

                        <p>Wedsla provide facilities for book your lawn in simple way at Affordable price. we insure for
                            fully Hassle free asured booking and save your time and money<b>.</b> </p>
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
@endsection
