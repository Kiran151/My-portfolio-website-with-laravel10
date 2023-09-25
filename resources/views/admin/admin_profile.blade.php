@extends('admin.admin_dashboard')
@section('admin')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">My Account</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Profile</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{!empty($adminData->image) ? asset('uploads/admin/img/'.$adminData->image) : asset('uploads/admin/img/no_image.jpg')}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                        <h4 class="mb-0">{{$adminData->username}}</h4>
                        <p class="text-muted">{{$adminData->name =='admin' ? '@Admin':'@User'}}</p>

                        <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                        <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

                        <div class="text-start mt-3">
                            <h4 class="font-13 text-uppercase">About Me :</h4>
                            <p class="text-muted font-13 mb-3">
                                Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.
                            </p>
                            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{$adminData->username}}</span></p>
                        
                            <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">{{$adminData->phone}}</span></p>
                        
                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">{{$adminData->email}}</span></p>
                        
                        </div>                                    

                        <ul class="social-list list-inline mt-3 mb-0">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                            </li>
                        </ul>   
                    </div>                                 
                </div> <!-- end card -->
            </div> <!-- end col-->

            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">           
                            <div class="tab-pane active" id="settings" role="tabpanel">
                                <form method="POST" action="{{route('admin.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Name</label>
                                                <input type="text" value="{{$adminData->name}}" name="name" class="form-control" id="firstname" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">User Name</label>
                                                <input type="text" value="{{$adminData->username}}" name="username" class="form-control" id="lastname" placeholder="Enter user name">
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="useremail" class="form-label">Email Address</label>
                                                <input type="email" value="{{$adminData->email}}" name="email" class="form-control" id="useremail" placeholder="Enter email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Mobile Number</label>
                                                <input type="number" value="{{$adminData->phone}}" name="phone" class="form-control" id="" placeholder="Enter number">
                                            </div>
                                        </div>
                                    </div> <!-- end row -->
                                    <label for="imagePicker" class="imagePickerWrapper">
                                        <img src="{{!empty($adminData->image) ? asset('uploads/admin/img/'.$adminData->image) : asset('uploads/admin/img/no_image.jpg')}}" id="imagePickerBox" height="120px" width="120px"  class="imagePickerPlaceholder">
                                        {{-- <span class="editIcon"><i class="bi bi-pencil-square"></i></span> --}}
                                        <span class="deleteIcon bottomRight" onclick="deleteSelectedImage()"><i class="ri-close-circle-fill fs-4"></i></span>
                                      </label>
                                      <input type="file" name="image" id="imagePicker" accept="image/*" style="display: none;">
                                    <div class="text-end">
                                        <button id="submitButton" type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end settings content-->

                        </div> <!-- end tab-content -->
                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->

</div>
<style>
    .imagePickerWrapper {
      position: relative;
      display: inline-block;
      cursor: pointer;
   
    }
    /* .editIcon {
    position: absolute;
    top: -10px;
    right: -12px;
    width: 20px;
    height: 20px;
    background-color:''; 
    background-size: cover;
    background-position: center;
    cursor: pointer;
  } */
  .deleteIcon.bottomRight {
    position: absolute;
    bottom: -10px;
    right: -12px;
    width: 20px;
    height: 20px;
    background-image:''; /* Replace with your edit icon image */
    background-size: cover;
    background-position: center;
    cursor: pointer;
  }
    .imagePickerPlaceholder {
      width: 120px;
      height: 120px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 3px solid #f0efef;
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat;
    }
  
    .imagePickerPlaceholder span {
      color: #555;
    }
  </style>
  
<script>
    document.getElementById('imagePicker').addEventListener('change', handleImageSelect);
  
    function handleImageSelect(event) {
      var imagePickerBox = document.getElementById('imagePickerBox');
      var file = event.target.files[0];
  
      if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
         $('#imagePickerBox').attr('src',e.target.result)
        };
  
        reader.readAsDataURL(file);
      }
    }
    function deleteSelectedImage() {
    $('#imagePickerBox').attr('src','{{asset("uploads/admin/img/no_image.jpg")}}')
    imagePickerBox.classList.add('imagePickerPlaceholder');
    document.getElementById('imagePicker').value = '';
  }
  </script>

@endsection
