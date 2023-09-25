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
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Home</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('update.home') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $data->title }}" name="title"
                                        placeholder="" id="example-text-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Subtitles</label>
                                <div class="col-sm-10">
                                    <input type="text" name="subtitle" id="selectize-tags" value="{{$data->subtitle}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Background Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" data-plugins="dropify"
                                        data-height="300" data-default-file="{{!empty($data->background_image) ? asset('uploads/home/'.$data->background_image) : asset('uploads/admin/img/no_image.jpg')}}" />
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-success" type="submit">Update Home</button>
                            </div>
                        </form>
                        <!-- end row -->

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
@endsection
