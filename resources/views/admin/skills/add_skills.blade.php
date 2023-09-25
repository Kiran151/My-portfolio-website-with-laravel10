@extends('admin.admin_dashboard')
@section('admin')
    <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Skills</a></li>
                            <li class="breadcrumb-item active">{{!empty($data)?'Edit':'Add'}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{!empty($data)?'Edit':'Add'}} Skill</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('save.skill',@$data->id) }}">
                            @csrf
                            <input type="hidden" name="id" value="">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Skill</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{@$data->skill}}" name="skill"
                                        placeholder="" id="example-text-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Percentage</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" value="{{@$data->percentage}}" name="percentage"
                                        placeholder="" id="example-text-input">
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-success" type="submit">{{!empty($data)?'Update':'Add'}} Skill</button>
                            </div>
                        </form>
                        <!-- end row -->

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
@endsection
