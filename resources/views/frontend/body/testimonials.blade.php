@php
    $image=App\Models\Home::pluck('background_image')->first();
    $data=App\Models\Testimonial::all();
@endphp
<div class="testimonials paralax-mf bg-image" style="background-image:  url(uploads/home/{{$image}})">
    <div class="overlay-mf"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @foreach ($data as $item)
                        <div class="swiper-slide">
                            <div class="testimonial-box">
                                <div class="author-test">
                                    <img src="{{asset('uploads/testimonials/'.$item->image)}}" alt=""
                                        class="rounded-circle b-shadow-a">
                                    <span class="author">{{$item->name}}</span>
                                </div>
                                <div class="content-test">
                                    <p class="description lead">
                                        “{{$item->testimonial}}”
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->
                        @endforeach         
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

                <!-- <div id="testimonial-mf" class="owl-carousel owl-theme">
      
    </div> -->
            </div>
        </div>
    </div>
</div>