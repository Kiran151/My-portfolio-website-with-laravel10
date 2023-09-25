@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Role</a></li>
                            <li class="breadcrumb-item active">{{ !empty($data) ? 'Edit' : 'Add' }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ !empty($data) ? 'Edit' : 'Add' }} Role</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="myForm" method="POST" action="{{ route('save.role', @$data->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ @$data->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Role Name</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" type="text" value="{{ @$data->name }}" name="name"
                                        placeholder="" id="example-text-input">
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-success" type="submit">{{ !empty($data) ? 'Update' : 'Add' }}
                                    Role</button>
                            </div>
                        </form>
                        <!-- end row -->

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                   
                },
                messages: {
                    name: {
                        required: 'This field is required',
                    },

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
