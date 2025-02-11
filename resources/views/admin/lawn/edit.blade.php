@extends('admin.adminlayout')
@section('bodycontent')
<!-- Content -->
<script src="https://cdn.tiny.cloud/1/ty527nw8wt2cprc2s5h9z8sc43kiqo79fvz306sa4s41xjoi/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
tinymce.init({
selector: ".textarea",
plugins: [
"insertdatetime"
],
width: 700,
height: 400,
});
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Lawns/</span> Edit Lawn</h4>

    <!-- Basic Layout -->
    <div class="row">

        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">New Lawn</h5>
                 
                    <!-- <small class="text-muted float-end">Merged input group</small> -->
                </div>
                <div class="card-body">
                    <form class="row" method="post" action="{{route('lawn.update',$lawn->id)}}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class=" col-md-6 mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Vendor</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <select required name="vender" class="form-control" >
                                    
                                <option class="form-control" selected disabled> Select a Vendor</option>
                                    @foreach ($vendors as $vendor)
                                            
                                <option class="form-control p-2" @if($lawn->vendor_id==$vendor->id)Selected @endif value="{{$vendor->id}}"> {{$vendor->name}}</option>
                                    @endforeach
                                </select>    
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Lawn Name</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" required class="form-control" value="{{$lawn->name}}" name="name" id="basic-icon-default-fullname" placeholder="Ramesh verma"  aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Contact</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" required class="form-control" value="{{$lawn->contact}}"  name="contact" id="basic-icon-default-fullname" placeholder="9876543210"  aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Email</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" required class="form-control" value="{{$lawn->email}}"  name="email" id="basic-icon-default-fullname" placeholder="email@email.com"  aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label class="form-label" >Locality</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" required class="form-control" value="{{$lawn->locality}}"  name="locality"  aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" >Price</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" required class="form-control" value="{{$lawn->price}}"  name="price"  aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="basic-icon-default-message">Address</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                                <textarea id="basic-icon-default-message" name="address"   required class="form-control" placeholder="Hi, Do you have a moment to talk Joe?" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2">{{$lawn->address}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="basic-icon-default-message">Description</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                                <textarea id="basic-icon-default-message" name="description"  class="form-control textarea" placeholder="Hi, Do you have a moment to talk Joe?" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2">{{$lawn->desription}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="basic-icon-default-message">Specification</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                                <textarea id="basic-icon-default-message" name="specification"    class="form-control textarea" placeholder="Hi, Do you have a moment to talk Joe?" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2">{{$lawn->specification}}</textarea>
                            </div>
                        </div>
                        <div class="form-check form-switch col-md-6 mb-3">
                            <input @if($lawn->status== true)checked @endif class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckChecked" checked="">
                            <label class="form-check-label" for="flexSwitchCheckChecked">Lawn Active</label>
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