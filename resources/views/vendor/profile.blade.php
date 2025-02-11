@extends('vendor.vendorlayout')
@section('bodycontent')
    <div class="container-xl px-4 mt-4">


        <div class="row">
            <div class="col-xl-4">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">

                        @if (Auth::guard('vendor')->user()->profile == null)
                            <img class="img-account-profile rounded-circle mb-2 img-fluid"
                                src="http://bootdey.com/img/Content/avatar/avatar1.png" alt>
                        @else
                            <img class="img-account-profile rounded-circle mb-2 img-fluid"
                                src="/images/vendor/{{Auth::guard('vendor')->user()->profile}}" alt>
                        @endif
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <form action="/vendor/update_profile" enctype="multipart/form-data" id="profile_image" method="POST"
                            style="display: none;">
                            @csrf
                            <input type="file" id="change_profile" name="profile" onchange="document.getElementById('profile_image').submit()">
                        </form>
                        <button class="btn btn-primary" onclick="document.getElementById('change_profile').click();"
                            type="button">Upload new image</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">

                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form action="/vendor/update" method="post">
                            @csrf
                            <div class="row gx-3 mb-3">

                                <div class="col-md-12">
                                    <label class="small mb-1" for="inputFirstName">Full Name</label>
                                    <input class="form-control" id="inputFirstName" type="text" name="name"
                                        placeholder="Enter your first name" value="{{Auth::guard('vendor')->user()->name}}">
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

                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="address" id="address" rows="3">{{Auth::guard('vendor')->user()->address}}</textarea>
                                </div>

                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel" name="phone"
                                        placeholder="Enter your phone number" value="{{Auth::guard('vendor')->user()->contact}}">
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="email">Email</label>
                                    <input class="form-control" id="email" type="text" name="email" disabled
                                        placeholder="Enter your Email" value="{{Auth::guard('vendor')->user()->email}}">
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@stop
