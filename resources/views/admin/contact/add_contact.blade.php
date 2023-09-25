@extends('admin.admin_dashboard')
@section('admin')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                            <li class="breadcrumb-item active">{{!empty($data)?'Edit' :'Add'}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{!empty($data)?'Update' :'Add'}} Contact</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('update.contact',@$data->id) }}">
                            @csrf
                            <input type="hidden" name="id" value="">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{@$data->address}}" name="address" placeholder=""
                                        id="example-text-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{@$data->phone}}" name="phone" placeholder=""
                                        id="example-text-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{@$data->email}}" name="email" placeholder=""
                                        id="example-text-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Facebook Link</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{@$data->facebook_link}}" name="facebook_link" placeholder=""
                                        id="example-text-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Instagram Link</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{@$data->instagram_link}}" name="instagram_link" placeholder=""
                                        id="example-text-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Twitter Link</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{@$data->twitter_link}}" name="twitter_link" placeholder=""
                                        id="example-text-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Linkedin Link</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{@$data->linkedin_link}}" name="linkedin_link" placeholder=""
                                        id="example-text-input">
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-success" type="submit">{{!empty($data)?'Update' :'Add'}} Contact</button>
                            </div>
                        </form>
                        <!-- end row -->

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
@endsection
