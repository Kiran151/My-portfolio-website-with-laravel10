@php
    $data=App\Models\Service::all();
@endphp
<section id="services" class="services-mf pt-5 route">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box text-center">
                    <h3 class="title-a">
                        Services
                    </h3>
                    <div class="line-mf"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($data as $item)
            <div class="col-md-4">
                <div class="service-box">
                    <div class="service-ico">
                        <span class="ico-circle">{!! $item->icon !!}</span>
                    </div>
                    <div class="service-content">
                        <h2 class="s-title">{{$item->service}}</h2>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>