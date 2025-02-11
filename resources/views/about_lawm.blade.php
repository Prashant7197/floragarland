@extends('layout.mainlayout')
@section('main')
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <div class="row d-md-flex d-none">
        <div class="col-12">
            <img src="/images/icon/lawn_bg.jpeg" style="width:100%;" alt="">
            <h2
                style="position: absolute; bottom:0%;text-align:center; border-radius:10px; background-color: #ffffff; left: 50%;
            transform: translatex(-50%);font-family: 'Lobster', cursive;">
               &nbsp; {{ $lawn->name }} &nbsp;</h2>
        </div>
    </div>
    <section>
        <div class="container">

            <div class="row">
                <div class="col-md-8">
                    
                  
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
      @php
      $images= explode(',',$lawn->images);
      $active='active';
      @endphp
      @foreach($images as $image)
    <div class="carousel-item {{$active}}">
      <img src="/{{$image}}" class="d-block w-100">
    </div>
    @php
    $active='';
    @endphp
    @endforeach


  </div>
</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h2
                    style="font-family: 'Lobster', cursive;" class="d-md-none d-flex">
                   &nbsp; {!! $lawn->name !!} &nbsp;</h2>
                    <p style="font-weight: bold;"><img src="/images/placeholder.png" height="25px" width="25px">&nbsp;<span style="font-weight: bold; color: #255485;">Place: </span> {!!$lawn->locality!!}</p>
                   {!! $lawn->specification !!} 
                   {!! $lawn->desription !!}
           
                    {{-- <form action=""> --}}
                        <h2>Booking Form</h2>
                        @if( Auth::guard('customer')->check())
                        <form class="row py-2 my-2" action="/booknow" id="myForm" style="background: lightgray;" method="post">
                            @csrf
                            <input type="hidden" name="lawn_id" value="{{ $lawn->id }}">
                            <div class="form-group col-md-12">
                                <label for="inputName" class="col-form-label">Name</label>
                                <div class="col-sm-1-12">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                                        value="{{ Auth::guard('customer')->user()->name }}" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName" class="col-form-label">Email</label>
                                <div class="col-sm-1-12">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email"
                                        value="{{ Auth::guard('customer')->user()->email }}" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName" class="col-form-label">Mobile</label>
                                <div class="col-sm-1-12">
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Email"
                                        value="{{ Auth::guard('customer')->user()->contact }}" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName" class="col-form-label">Event</label>
                                <div class="col-sm-1-12">
                                    <select class="form-control" name="event">
                                        <option>Marrige</option>
                                        <option>Ring Ceremony</option>
                                        <option>Birthday</option>
                                        <option>Anniversary</option>
                                        <option>Business Party</option>
                                        <option>Seminar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName" class="col-form-label">Date</label>
                                <div class="col-sm-1-12">
                                    <input type="date" onchange="return check_availibility()" class="form-control"
                                        name="booking_date" id="date_of_booking" required>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName" class="col-form-label">Booking Notes</label>
                                <div class="col-sm-1-12">
                                    <textarea class="form-control" name="notes" rows="3"></textarea>
    
                                </div>
                            </div>
                            <div class="form-group col-md-12">
    
                                <div id="error-message" style="color: red;"></div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="" style="font-size:20px;">
                                    <button type="submit" id="submit_button"
                                        class="disabled btn btn-primary"
                                        style="background-color: #0074d9 !important;font-size: x-large; padding:0px 20px;font-family: 'EB Garamond', serif;">
                                        <div> Book your Lawn</span></div>
                                    </button>
                                    <!-- Include the Razorpay SDK library -->
                                    <!--<script src="https://checkout.razorpay.com/v1/checkout.js"></script>-->
    
                                    <!--<script>-->
                                        <!--// Function to open the Razorpay payment gateway-->
                                    <!--    function openPaymentGateway() {-->
    
                                    <!--        var form = document.getElementById("myForm");-->
                                    <!--        if (form.checkValidity()) {-->
                                    <!--            var email = document.getElementById('email').value;-->
                                    <!--            var mobile = document.getElementById('mobile').value;-->
                                                <!--// Create a new instance of Razorpay-->
                                    <!--            var options = {-->
                                                    <!--key: 'rzp_test_haTNEPRwjiPuCF', // Replace with your Razorpay API key-->
                                                    <!--amount: 100000, // Replace with the amount to be charged (in paise or smallest currency unit)-->
                                                    <!--currency: 'INR', // Replace with the appropriate currency code-->
                                                    <!--name: 'Wedsla', // Replace with your company name or website name-->
                                                    <!--description: 'Payment for book your slot', // Replace with a description of your product/service-->
                                    <!--                image: 'https://wedsla.com/images/logo.png',-->
                                    <!--                prefill: {-->
                                    <!--                    email: email,-->
                                    <!--                    contact: mobile,-->
                                                    <!--}, // Replace with the URL of your company logo (optional)-->
                                    <!--                handler: function(response) {-->
                                                        <!--// On successful payment, submit the form-->
                                    <!--                    form.submit();-->
                                    <!--                }-->
                                    <!--            };-->
                                    <!--            console.log(options);-->
    
                                                <!--// Open the Razorpay payment gateway-->
                                    <!--            var rzp = new Razorpay(options);-->
                                    <!--            rzp.open();-->
                                    <!--        } else {-->
                                    <!--            var errorMessage = document.getElementById("error-message");-->
                                    <!--            errorMessage.textContent = "Please fill in all the required fields.";-->
    
                                    <!--        }-->
                                    <!--        return false;-->
                                    <!--    }-->
                                    <!--</script>-->
    
    
                                </div>
                            </div>
                        </form>
                        @else
                        <form class="row py-2 my-2" action="/booknow" id="myForm" style="background: lightgray;" method="post">
                            @csrf
                            <input type="hidden" name="lawn_id" value="{{ $lawn->id }}">
                            <div class="form-group col-md-12">
                                <label for="inputName" class="col-form-label">Name</label>
                                <div class="col-sm-1-12">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                                         required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName" class="col-form-label">Email</label>
                                <div class="col-sm-1-12">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email"
                                         required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName" class="col-form-label">Mobile</label>
                                <div class="col-sm-1-12">
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile"
                                         required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName" class="col-form-label">Event</label>
                                <div class="col-sm-1-12">
                                    <select class="form-control" name="event">
                                        <option>Marrige</option>
                                        <option>Ring Ceremony</option>
                                        <option>Birthday</option>
                                        <option>Anniversary</option>
                                        <option>Business Party</option>
                                        <option>Seminar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName" class="col-form-label">Date</label>
                                <div class="col-sm-1-12">
                                    <input type="date" onchange="return check_availibility()" class="form-control"
                                        name="booking_date" id="date_of_booking" required>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName" class="col-form-label">Booking Notes</label>
                                <div class="col-sm-1-12">
                                    <textarea class="form-control" name="notes" rows="3"></textarea>
    
                                </div>
                            </div>
                            <div class="form-group col-md-12">
    
                                <div id="error-message" style="color: red;"></div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="" style="font-size:20px;">
                                    <button type="submit" 
                                        class="disabled btn btn-primary"
                                        style="background-color: #0074d9 !important;font-size: x-large; padding:0px 20px;font-family: 'EB Garamond', serif;">
                                     <div> Book your Lawn</span></div>
                                    </button>
                                    <!-- Include the Razorpay SDK library -->
                                    <!--<script src="https://checkout.razorpay.com/v1/checkout.js"></script>-->
    
                                    <!--<script>-->
                                        <!--// Function to open the Razorpay payment gateway-->
                                    <!--    function openPaymentGateway() {-->
    
                                    <!--        var form = document.getElementById("myForm");-->
                                    <!--        if (form.checkValidity()) {-->
                                    <!--            var email = document.getElementById('email').value;-->
                                    <!--            var mobile = document.getElementById('mobile').value;-->
                                                <!--// Create a new instance of Razorpay-->
                                    <!--            var options = {-->
                                                    <!--key: 'rzp_test_haTNEPRwjiPuCF', // Replace with your Razorpay API key-->
                                                    <!--amount: 100000, // Replace with the amount to be charged (in paise or smallest currency unit)-->
                                                    <!--currency: 'INR', // Replace with the appropriate currency code-->
                                                    <!--name: 'Wedsla', // Replace with your company name or website name-->
                                                    <!--description: 'Payment for book your slot', // Replace with a description of your product/service-->
                                    <!--                image: 'https://wedsla.com/images/logo.png',-->
                                    <!--                prefill: {-->
                                    <!--                    email: email,-->
                                    <!--                    contact: mobile,-->
                                                    <!--}, // Replace with the URL of your company logo (optional)-->
                                    <!--                handler: function(response) {-->
                                                        <!--// On successful payment, submit the form-->
                                    <!--                    form.submit();-->
                                    <!--                }-->
                                    <!--            };-->
                                    <!--            console.log(options);-->
    
                                                <!--// Open the Razorpay payment gateway-->
                                    <!--            var rzp = new Razorpay(options);-->
                                    <!--            rzp.open();-->
                                    <!--        } else {-->
                                    <!--            var errorMessage = document.getElementById("error-message");-->
                                    <!--            errorMessage.textContent = "Please fill in all the required fields.";-->
    
                                    <!--        }-->
                                    <!--        return false;-->
                                    <!--    }-->
                                    <!--</script>-->
    
    
                                </div>
                            </div>
                        </form>
                        @endif
                    
                </div>

            </div>
        </div>
    </section>
@endsection
<script>
    function check_availibility() {
        var txt = $("#date_of_booking").val();
        $.get("/check_availibility", {
            booking_date: txt,
            lawn_id: {{ $lawn->id }}
        }, function(result) {
            if (result) {
                $('#submit_button').removeClass("disabled");
                $('#submit_button').attr("type", "submit");
                return true;
            } else {
                alert("This lawn is not free for this day");
                $('#submit_button').addClass("disabled");
                $('#submit_button').attr("type", "button");
                $("#date_of_booking").val("")
                return false;
            }
        });
    }
</script>
