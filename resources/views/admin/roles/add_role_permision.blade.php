@extends('admin.admin_dashboard')
@section('admin')
    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Roles in Permission</a></li>
                            <li class="breadcrumb-item active">{{ !empty($data) ? 'Edit' : 'Add' }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ !empty($data) ? 'Edit' : 'Add' }} Role Permission</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="myForm" method="POST" action="{{ route('save.role.permission', @$data->id) }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ @$data->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Roles</label>
                                <div class="col-sm-10  form-group">
                                    <select id="select" class="form-control" data-placeholder="Select Role"
                                        name="role_id" data-toggle="select2" data-width="100%">
                                        <option></option>
                                        @foreach ($role as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-check mb-2 form-check-primary">
                                <input class="form-check-input" type="checkbox" value="" id="permission_all">
                                <label class="form-check-label" for="permission_all">Permision All</label>
                            </div>
                            @foreach ($permission_groups as $item)
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="customckeck1">
                                            <label class="form-check-label"
                                                for="customckeck1">{{ $item->group_name }}</label>
                                        </div>
                                    </div>
                                    @php
                                        $permissions = App\Models\User::getPermissionByGroupName($item->group_name);
                                    @endphp
                                    <div class="col-3">
                                        @foreach ($permissions as $item)
                                            <div class="form-check mb-2 form-check-primary">
                                                <input class="form-check-input" name="permission[]" type="checkbox"
                                                    value="{{ $item->id }}" id="customckeck{{ $item->id }}">
                                                <label class="form-check-label"
                                                    for="customckeck1">{{ $item->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
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
    <script>
        $(document).ready(function() {
            $('#select').change(function() {
                $role_id = $('#select').val();
                $.ajax({
                    'type': 'GET',
                    'url': '{{ route('selectRoleAjax') }}',
                    'data': {
                        'role_id': $role_id
                    },
                    success: function(data) {
                        console.log(data);

                        if (data == 1) {
                            Swal.fire('role has already permissions');
                            $('.swal2-confirm').click(function() {
                                $('#select').val('').trigger('change');
                            })

                        }
                    }
                })
            })
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#permission_all').click(function() {
                if ($(this).is(':checked')) {
                    $('input[type=checkbox]').prop('checked', true);
                } else {
                    $('input[type=checkbox]').prop('checked', false);

                }
            })

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
