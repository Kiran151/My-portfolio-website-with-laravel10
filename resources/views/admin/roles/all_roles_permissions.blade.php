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
                            <li class="breadcrumb-item active">All Roles Permissions</li>
                        </ol>
                    </div>
                    <h4 class="page-title">All Roles Permissions</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="basic-datatable" class="table dt-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">SL.NO</th>
                                    <th class="text-center">ROLE NAME</th>
                                    <th class="text-center">PERMISSION NAME</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($roles as $item)
                                    <tr class="text-center">
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td >
                                            @foreach ($item->permissions as $data)
                                                <span class="badge badge-pill bg-success">{{$data->name}}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.role.permission', $item->id) }}" class="action-icon"> <i
                                                    class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="{{ route('delete.role.permission', $item->id) }}" id="delete"
                                                class="action-icon"> <i class="mdi mdi-delete"></i></a>
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
@endsection
