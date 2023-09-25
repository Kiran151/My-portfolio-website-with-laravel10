@php
    $image=App\Models\Home::pluck('background_image')->first();
    $data=App\Models\Contact::first();

@endphp
<section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route"
style="background-image:  url(uploads/home/{{$image}})">
<div class="overlay-mf"></div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="contact-mf">
                <div id="contact" class="box-shadow-full">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="title-box-2">
                                <h5 class="title-left">
                                    Send Message
                                </h5>
                            </div>
                            <div>
                                <form action="{{route('send.message')}}" method="post" role="form"
                                    class="">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control"
                                                    id="name" placeholder="Your Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email"
                                                    id="email" placeholder="Your Email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="subject"
                                                    id="subject" placeholder="Subject" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12 text-center my-3">
                                            <div class="loading">Loading</div>
                                            <div class="error-message"></div>
                                            <div class="sent-message">Your message has been sent. Thank you!
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12 text-center">
                                            <button type="submit"
                                                class="button button-a button-big button-rouded mt-2">Send
                                                Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="title-box-2 pt-4 pt-md-0">
                                <h5 class="title-left">
                                    Get in Touch
                                </h5>
                            </div>
                            <div class="more-info">
                                <ul class="list-ico">
                                    <li><span class="bi bi-geo-alt-fill"></span>{{$data->address}}</li>
                                    <li><span class="bi bi-telephone-fill"></span> {{$data->phone}}</li>
                                    <li><span class="bi bi-envelope-fill"></span> {{$data->email}}</li>
                                </ul>
                            </div>
                            <div class="socials">
                                <ul>
                                    <li><a href="{{$data->facebook_link}}"><span class="ico-circle"><i
                                                    class="bi bi-facebook"></i></span></a></li>
                                    <li><a href="{{$data->instagram_link}}"><span class="ico-circle"><i
                                                    class="bi bi-instagram"></i></span></a></li>
                                    <li><a href="{{$data->twitter_link}}"><span class="ico-circle"><i
                                                    class="bi bi-twitter"></i></span></a></li>
                                    <li><a href="{{$data->linkedin_link}}"><span
                                                class="ico-circle">
                                                <i class="bi bi-linkedin"></i></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>