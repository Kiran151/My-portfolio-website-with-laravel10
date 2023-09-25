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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Permission</a></li>
                            <li class="breadcrumb-item active">{{ !empty($data) ? 'Edit' : 'Add' }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ !empty($data) ? 'Edit' : 'Add' }} Permission</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="myForm" method="POST" action="{{ route('save.permission', @$data->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ @$data->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Permission Name</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" type="text" value="{{ @$data->name }}" name="name"
                                        placeholder="" id="example-text-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Group Name</label>
                                <div class="col-sm-10  form-group">
                                    <select id="select" class="form-control" data-placeholder="Select Group"
                                        name="group_name" data-toggle="select2" data-width="100%">
                                        <option></option>
                                        <option value="home" {{ @$data->group_name == 'home' ? 'selected' : '' }}>Home</option>
                                        <option value="about" {{ @$data->group_name == 'about' ? 'selected' : '' }}>About
                                        </option>
                                        <option value="skills" {{ @$data->group_name == 'skills' ? 'selected' : '' }}>Skills
                                        </option>
                                        <option value="services" {{ @$data->group_name == 'services' ? 'selected' : '' }}>
                                            Services</option>
                                        <option value="testimonials"
                                            {{ @$data->group_name == 'testimonials' ? 'selected' : '' }}>Testimonials</option>
                                        <option value="contacts" {{ @$data->group_name == 'contacts' ? 'selected' : '' }}>
                                            Contacts</option>
                                        <option value="messages" {{ @$data->group_name == 'messages' ? 'selected' : '' }}>
                                            Messages</option>
                                        <option value="settings" {{ @$data->group_name == 'settings' ? 'selected' : '' }}>
                                            Settings</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-success" type="submit">{{ !empty($data) ? 'Update' : 'Add' }}
                                    Permission</button>
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
            // console.log('dd');
            // var group_name = {{ json_encode(@$data->group_name) }};
            // if (group_name !== null) {
            //     $('#select').val(group_name).trigger('change');
            // }


            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    group_name: {
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
