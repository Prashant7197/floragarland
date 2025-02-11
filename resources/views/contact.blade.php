@extends('layout.mainlayout')
@section('main')
    <script>
        document.getElementById("contactnav").classList.add('active');
    </script>

    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('images/bgg1.png');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread text-light" style="text-shadow: 2px 1px 7px black; ">Contact us</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container">

            <div class="row block-9 justify-content-center mb-5">
                <div class="col-md-10 mb-md-5">
                    <h2 class="text-center">If you got any questions <br>please do not hesitate to send us a message</h2>

                    <form action="/enquery" method="post"class="bg-light py-5 px-3 contact-form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row mb-5">
                                    <div class="col-md-12 text-center py-4">
                                        <div class="icon">
                                            <span class="icon-map-o"></span>
                                        </div>
                                        <p><span>Address:</span> 	S9/92 kh Pandeypur Varanasi Uttar Pradesh 221007</p>
                                    </div>
                                    <div class="col-md-12 text-center border-height py-4">
                                        <div class="icon">
                                            <span class="icon-mobile-phone"></span>
                                        </div>
                                        <p><span>Phone:</span> <a href="tel://8687883338">	+91 8687883338</a></p>
                                    </div>
                                    <div class="col-md-12 text-center py-4">
                                        <div class="icon">
                                            <span class="icon-envelope-o"></span>
                                        </div>
                                        <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@wedsla.com</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <input required type="text" class="form-control" name="name"
                                            placeholder="Your Full Name">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input required type="email" class="form-control" name="email"
                                            placeholder="Your Email Id">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input required type="number" class="form-control" name="contact"
                                            placeholder="Your Mobile no.">
                                    </div>
                                    <div class="col-12 form-group">
                                        <input required type="text" class="form-control" placeholder="Subject"
                                            name="subject">
                                    </div>
                                    <div class="col-12 form-group">
                                        <textarea required cols="30" rows="7" class="form-control" name="massage" placeholder="Message"></textarea>
                                    </div>
                                    <div class="m-auto form-group">
                                        <input type="submit" value="Send Message" class="btn btn-primary  py-3 px-5">
                                    </div>
                                </div>
                            </div>
                        </div>


                        @csrf

                    </form>

                </div>
            </div>

        </div>
    </section>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14422.683161202462!2d82.9947858!3d25.3488258!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398e2ff3b0bf1985%3A0x64b03ce9dbebe227!2sWebline%20Infotech!5e0!3m2!1sen!2sin!4v1683893501205!5m2!1sen!2sin"
        style="width:100%; " height="600" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
@endsection
