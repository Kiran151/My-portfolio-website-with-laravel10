@php
    $data=App\Models\About::first();
    $skillData=App\Models\Skill::all();
@endphp
<section id="about" class="about-mf sect-pt4 route">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="box-shadow-full">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-6 col-md-5">
                                    <div class="about-img">
                                        <div class=" text-center">
                                            <img src="{{asset('uploads/about/'.$data->image)}}" alt="image" class="img-fluid rounded" width="150">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-7">
                                    <div class="about-info">
                                        <p><span class="title-s">Name: </span> <span>{{$data->name}}</span></p>
                                        <p><span class="title-s">Profile: </span> <span>{{$data->profile}}</span>
                                        </p>
                                        <p><span class="title-s">Email: </span> <span>{{$data->email}}</span></p>
                                        <p><span class="title-s">Phone: </span> <span>{{$data->phone}}</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="skill-mf">
                                <p class="title-s">Skills</p>
                                @foreach ($skillData as $item)
                                <span>{{$item->skill}}</span> <span class="pull-right">{{$item->percentage}}%</span>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{$item->percentage}}%;"
                                        aria-valuenow="{{$item->percentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about-me pt-4 pt-md-0">
                                <div class="title-box-2">
                                    <h5 class="title-left">
                                        About me
                                    </h5>
                                </div>
                                <p class="lead">
                                   {{$data->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>