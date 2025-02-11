@extends('vendor.vendorlayout')
@section('bodycontent')
<!-- Content -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
tinymce.init({
selector: "textarea",
plugins: [
"insertdatetime"
],
width: 700,
height: 400,
});
</script>
<div class="container-xxl flex-grow-1 container-p-y">
   
    <!-- Basic Layout -->
    <div class="row">

        <div class="col-md-12">
            <div class="card mb-4">
                 <div class="card-body">
                    <form class="row" method="post" action="/vendor/lawn" enctype="multipart/form-data">
                        @csrf
                        <!-- @method("PUT") -->
                       <input type="hidden" value="{{$lawn->id}}" name="lawn_id">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Lawn Name</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" required class="form-control" value="{{$lawn->name}}" placeholder="{{$lawn->name}}" name="name" id="basic-icon-default-fullname"   aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Contact</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" required class="form-control" name="contact" id="basic-icon-default-fullname" value="{{$lawn->contact}}" placeholder="{{$lawn->contact}}"  aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Email</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" required class="form-control" name="email" id="basic-icon-default-fullname" value="{{$lawn->email}}" placeholder="{{$lawn->email}}" aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label class="form-label" >Locality</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" required class="form-control" name="locality" value="{{$lawn->locality}}" placeholder="{{$lawn->locality}}"  aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" >Price</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" required class="form-control" name="price"  value="{{$lawn->price}}" placeholder="{{$lawn->price}}" aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
  

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="basic-icon-default-message">Address</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                                <textarea id="basic-icon-default-message" name="address" required class="form-control"  aria-describedby="basic-icon-default-message2">{{$lawn->address}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="basic-icon-default-message">Description</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                                <textarea id="basic-icon-default-message" name="description" required class="form-control" aria-describedby="basic-icon-default-message2">{{$lawn->desription}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="basic-icon-default-message">Specification</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                                <textarea id="basic-icon-default-message" name="specification" required class="form-control" aria-describedby="basic-icon-default-message2">{{$lawn->specification}}</textarea>
                            </div>
                        </div>
                        <div class="form-check form-switch col-md-6 mb-3">
                        <div class="form-check form-switch col-md-6 mb-3">
                            <input @if($lawn->status == 1)checked @endif class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckChecked" >
                            <label class="form-check-label" for="flexSwitchCheckChecked">Lawn Active</label>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    <style>
        #dddas{
            height:100px;width:100px;cursor:pointer;font-size: 50px;margin:auto;display:block; text-align:center;color:black; background-color: white;    border: 1px solid gray;    padding: 2px;    border-radius: 50%;
        }
    #dddas:hover{
        background-color:blue;
        color:white;
    }
    </style>
    <div class="row">

        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body row">
                @foreach(explode(',',$lawn->images) as $image)
                    <div class="col-md-4 no-gutter" style="position:relative;">
                        <img src="/{{$image}}" alt="" class="img-fluid">
                       <span onclick="delimagde(this,'{{$image}}')"  style="cursor:pointer;font-size: 10px;    position: absolute;    right: 15px;    top: 0;    background-color: white;    border: 1px solid gray;    padding: 2px;    border-radius: 50%;"> <i class="bx bx-trash"></i></span>
                    </div>
                    @endforeach
                    <div class="col-md-4 no-gutter" style="margin:auto;">
                         <span onclick="document.getElementById('file_upload').click()" id="dddas"  style=""> +</span>
                         <input type="file" id="file_upload" onchange="addimage(this)" style="display:none;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

<script>
function delimagde(k,e){

$.post('/vendor/lawn/image/del',{lawn_id:'{{$lawn->id}}',image:e,_token:'{{csrf_token()}}'},function(response){
    
    if(response.status=="Success"){
k.parentNode.remove();
    }

});

}
function addimage(e) {
    
    var formData = new FormData();
    formData.append('image',e.files[0]);
    formData.append('_token','{{csrf_token()}}');
    formData.append('lawn_id','{{$lawn->id}}');
    var xhr = new XMLHttpRequest()
    xhr.open('POST','/vendor/lawn/image/add',true);
    xhr.onreadystatechange=function (){
        if(xhr.readyState===4&&xhr.status===200){
            var res = JSON.parse(xhr.response);
            if(res.status=="Success"){
                var html =`<div class="col-md-4 no-gutter" style="position:relative;">
                        <img src="/`+res.path+`" alt="" class="img-fluid">
                       <span onclick="delimagde(this,'`+res.path+`')"  style="cursor:pointer;font-size: 10px;    position: absolute;    right: 15px;    top: 0;    background-color: white;    border: 1px solid gray;    padding: 2px;    border-radius: 50%;"> <i class="bx bx-trash"></i></span>
                    </div>`;
e.parentNode.insertAdjacentHTML('beforeBegin',html);
e.value='';
            }
        }
    };
    xhr.send(formData);
// $.post('/vendor/lawn/image/add',formData,function(response){console.log(response);});

}

</script>
@stop
