@extends('admin.admin_dashboard')
@section('admin')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                            <li class="breadcrumb-item active">Admins</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Admins</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-2">
                            <a href="{{ route('add.admin') }}" class="btn btn-danger mb-2"><i
                                    class="mdi mdi-plus-circle me-2"></i> Add Admin</a>
                        </div>
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">SL.NO</th>
                                    <th class="text-center">IMAGE</th>
                                    <th class="text-center">NAME</th>
                                    <th class="text-center">EMAIL</th>
                                    <th class="text-center">PHONE</th>
                                    <th class="text-center">ROLE</th>
                                    <th class="text-center">STATUS</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tr class="text-center">
                                        <td>{{ $i++ }}</td>
                                        <td><img src="{{ !empty($item->image) ? asset('uploads/admin/img/' . $item->image) : asset('uploads/admin/img/no_image.jpg') }}"
                                                alt="image" class="img-fluid avatar-md rounded"></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>
                                            @foreach ($item->roles as $role)
                                                <span class="badge bg-success">{{$role->name}}</span>
                                            @endforeach
                                        </td>
                                        <td><span
                                                class="badge status {{ $item->status == 'active' ? 'bg-success' : 'bg-danger' }} ">{{ $item->status }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('add.admin', $item->id) }}" class="action-icon"> <i
                                                    class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="{{ route('delete.admin', $item->id) }}" id="delete"
                                                class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                            @if ($item->status == 'active')
                                                <a style="cursor: pointer"
                                                    onclick="activeOrInactive({{ $item->id }},'active')" title="active"
                                                    class="action-icon"> <i class="ri-thumb-up-fill"></i></a>
                                            @else
                                                <a style="cursor: pointer"
                                                    onclick="activeOrInactive({{ $item->id }},'inactive')"
                                                    title="inactive" class="action-icon"> <i
                                                        class="ri-thumb-down-fill"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>


                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div>
    <script>
        function activeOrInactive(id, action) {
            $.ajax({
                'type': 'GET',
                'url': "{{ url('/admin/activeInactiveAdmin') }}",
                'data': {
                    'id': id,
                    'action': action
                },
                'success': function(data) {
                    toastr.success('Updated successfully');
                    location.reload();
                }
            })
        }
    </script>
@endsection
