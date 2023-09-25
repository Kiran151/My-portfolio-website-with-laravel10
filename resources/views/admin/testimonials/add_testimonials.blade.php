@extends('admin.admin_dashboard')
@section('admin')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Testimonials</a></li>
                            <li class="breadcrumb-item active">{{ !empty($data) ? 'Edit' : 'Add' }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ !empty($data) ? 'Edit' : 'Add' }} Testimonial</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('save.testimonial', @$data->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="remove_img" id="remove_img" value="">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-2">
                                    <input type="file" id="image" value="1" name="image"
                                        data-plugins="dropify" data-height="150"
                                        data-default-file="{{ !empty($data->image) ? asset('uploads/testimonials/' . $data->image) : asset('uploads/admin/img/no_image.jpg') }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ @$data->name }}" name="name"
                                        placeholder="" id="example-text-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Testimonial</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" class="form-control" name="testimonial" rows="5">{{ @$data->testimonial }}</textarea>
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-success" type="submit">{{ !empty($data) ? 'Update' : 'Add' }}
                                    Testimonial</button>
                            </div>
                        </form>
                        <!-- end row -->

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropify-clear').on('click', function() {
                $('#remove_img').val(1);
            })
        })
    </script>
@endsection
