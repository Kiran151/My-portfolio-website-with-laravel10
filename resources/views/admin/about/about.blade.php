@extends('admin.admin_dashboard')
@section('admin')
    <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">About</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit About</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('update.about') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-2">
                                    <input type="file" name="image" data-plugins="dropify"
                                        data-height="150" data-default-file="{{!empty($data->image) ? asset('uploads/about/'.$data->image) : asset('uploads/admin/img/no_image.jpg')}}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{$data->name}}" name="name"
                                        placeholder="" id="example-text-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="profile"  value="{{$data->profile}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" name="email"  value="{{$data->email}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="phone"  value="{{$data->phone}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" class="form-control" name="description" rows="5">{{$data->description}}</textarea>
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-success" type="submit">Update About</button>
                            </div>
                        </form>
                        <!-- end row -->

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
@endsection
