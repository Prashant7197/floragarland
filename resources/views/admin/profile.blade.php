@extends('admin.adminlayout')
@section('bodycontent')
    <div class="container-xl px-4 mt-4">

        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="/admin/profile" >Profile</a>
            {{-- <a class="nav-link" href="/admin/billing" target="__blank">Billing</a> --}}
            <a class="nav-link" href="/admin/security" >Security</a>
            {{-- <a class="nav-link" href="/admin/notification" target="__blank">Notifications</a> --}}
        </nav>
        <hr class="mt-0 mb-4">
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

                        @if (Auth::user()->profile == null)
                            <img class="img-account-profile rounded-circle mb-2 img-fluid"
                                src="http://bootdey.com/img/Content/avatar/avatar1.png" alt>
                        @else
                            <img class="img-account-profile rounded-circle mb-2 img-fluid"
                                src="/images/user/{{Auth::user()->profile}}" alt>
                        @endif
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <form action="/admin/update_profile" enctype="multipart/form-data" id="profile_image" method="POST"
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
                        <form action="/admin/update" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username Or Email</label>
                                <input class="form-control" id="inputUsername" type="text" name="email" disabled
                                    placeholder="Enter your username" value="{{ Auth::user()->email }}">
                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-12">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input class="form-control" id="inputFirstName" type="text" name="name"
                                        placeholder="Enter your full name" value="{{ Auth::user()->name }}">
                                </div>

                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Position</label>
                                    <input class="form-control" id="inputOrgName" type="text" name="position"
                                        placeholder="Enter your organization Post" value="{{ Auth::user()->position }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Location</label>
                                    <input class="form-control" id="inputLocation" type="text" name="address"
                                        placeholder="Enter your address" value="{{ Auth::user()->location }}">
                                </div>
                            </div>



                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel" name="mobile"
                                        placeholder="Enter your phone number" value="{{ Auth::user()->mobile }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                    <input class="form-control" id="inputBirthday" type="date" name="birthday"
                                        placeholder="Enter your birthday" value="{{ Auth::user()->birthday }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" type="button">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@stop
