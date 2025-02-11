@extends('agent.agentlayout')
@section('bodycontent')
    <!-- Content -->

    <div class="container-xl px-4 mt-4">

        <div class="row">
            <div class="col-lg-8">
                <!-- Change password card-->
                <div class="card mb-4">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="post" action="/agent/change_password" id="form">
                            @csrf
                            <!-- Form Group (current password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="currentPassword">Current Password</label>
                                <input class="form-control" name="cpassword" id="currentPassword" type="password"
                                    placeholder="Enter current password">
                            </div>
                            <!-- Form Group (new password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="newPassword">New Password</label>
                                <input class="form-control" id="newPassword" name="npassword" type="password"
                                    placeholder="Enter new password">
                            </div>
                            <!-- Form Group (confirm password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                <input class="form-control" id="confirmPassword" name="conpassword" type="password"
                                    placeholder="Confirm new password">
                            </div>
                            <button class="btn btn-primary" type="button"
                                onclick="if(document.getElementById('newPassword').value==document.getElementById('confirmPassword').value)document.getElementById('form').submit();">Save</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- / Content -->
@stop
