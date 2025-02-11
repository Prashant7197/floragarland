@extends('layout.mainlayout')
@section('main')
    <script>
        document.getElementById("agentnav").classList.add('active');
    </script>

    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('images/bg_1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Agent <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Agent</h1>
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
@endsection
