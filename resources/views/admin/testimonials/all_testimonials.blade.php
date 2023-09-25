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
                            <li class="breadcrumb-item active">All</li>
                        </ol>
                    </div>
                    <h4 class="page-title">All Testimonials</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-2">
                            <a href="{{ route('add.testimonial') }}" class="btn btn-danger"><i
                                    class="mdi mdi-plus-circle"></i>Add Testimonial</a>
                        </div>
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">SL.NO</th>
                                    <th class="text-center">IMAGE</th>
                                    <th class="text-center">NAME</th>
                                    <th class="text-center">TESTIMONIAL</th>
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
                                        <td><img src="{{ !empty($item->image) ? asset('uploads/testimonials/' . $item->image) : asset('uploads/admin/img/no_image.jpg') }}"
                                                alt="image" class="img-fluid avatar-md rounded"></td>
                                        <td>{{ $item->name }}</td>
                                        <td class="text-wrap">{{ $item->testimonial }}</td>
                                        <td>
                                            <a href="javascript:void(0);" class="action-icon"> <i
                                                    class="mdi mdi-eye"></i></a>
                                            <a href="{{ route('add.testimonial', $item->id) }}" class="action-icon"> <i
                                                    class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="{{ route('delete.testimonial', $item->id) }}" id="delete"
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
