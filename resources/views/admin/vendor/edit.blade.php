@extends('admin.adminlayout')
@section('bodycontent')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Vendors/</span> Edit Vendor</h4>

    <!-- Basic Layout -->
    <div class="row">

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Vendor</h5>
                 
                    <!-- <small class="text-muted float-end">Merged input group</small> -->
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('vendor.update',$vendor->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT') 
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Vendor Name</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" required class="form-control" value="{{$vendor->name}}" name="name" id="basic-icon-default-fullname" placeholder="{{$vendor->cours_name}}" aria-label="{{$vendor->cours_name}}" aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Contact</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" required class="form-control" name="contact"value="{{$vendor->contact}}" id="basic-icon-default-fullname" placeholder="9876543210"  aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Email</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" required class="form-control" name="email" value="{{$vendor->email}}" id="basic-icon-default-fullname" placeholder="email@email.com"  aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Profile Image</label>
                            <img for="formfile" src="/images/vendor/{{$vendor->profile}}" class="" style="height: 100px;" />
                            <input class="form-control" name="profile"  type="file" id="formFile">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-message">Address</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                                <textarea id="basic-icon-default-message" name="address" required class="form-control" placeholder="Hi, Do you have a moment to talk Joe?" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2">{{$vendor->address}}</textarea>
                            </div>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckChecked" @if($vendor->status== true)checked @endif>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Vendor Active</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
@stop