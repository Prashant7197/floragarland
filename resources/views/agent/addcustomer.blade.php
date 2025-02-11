@extends('agent.agentlayout')
@section('bodycontent')
    <div class="container-xl px-4 mt-4">


        <div class="row">
            <div class="col-xl-8">

                <div class="card mb-4">
                    <div class="card-header">Create a new Account</div>
                    <div class="card-body">
                        <form action="" method="post" id="form">
                            @csrf
                            <div class="row gx-3 mb-3">

                                <div class="col-md-12">
                                    <label class="small mb-1" for="inputFirstName">Full Name</label>
                                    <input class="form-control" id="inputFirstName" type="text" name="name"
                                        placeholder="Enter your first name" required>
                                </div>


                            </div>

                            {{-- <div class="row gx-3 mb-3">

                    <div class="col-md-6">
                        <label class="small mb-1" for="inputOrgName">Organization name</label>
                        <input class="form-control" id="inputOrgName" type="text"
                            placeholder="Enter your organization name" value="Start Bootstrap">
                    </div>

                    <div class="col-md-6">
                        <label class="small mb-1" for="inputLocation">Location</label>
                        <input class="form-control" id="inputLocation" type="text"
                            placeholder="Enter your location" value="San Francisco, CA">
                    </div>
                </div> --}}



                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel" name="phone"
                                        placeholder="Enter your phone number" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="email">Email</label>
                                    <input class="form-control" id="email" type="email" name="email"
                                        placeholder="Enter your  Email" required>
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" >Password</label>
                                    <input class="form-control" type="password" id="password" name="password"
                                        placeholder="Enter your Password"  required>
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" >Confirm Password</label>
                                    <input class="form-control"  type="password" id="cpassword" name="cpassword"
                                        placeholder="Confirm Your Password" required>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="button" onclick="if(document.getElementById('password').value==document.getElementById('cpassword').value){document.getElementById('form').submit();}">Create New Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
