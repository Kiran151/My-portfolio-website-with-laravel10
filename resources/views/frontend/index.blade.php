    @extends('frontend.master')
    @section('main')
        <!-- ======= Home Section ======= -->
        @include('frontend.body.home')
        <!-- End Home Section -->
        <!-- ======= About Section ======= -->

        @include('frontend.body.about')
        <!-- End About Section -->

        <!-- ======= Services Section ======= -->
        @include('frontend.body.service')
        <!-- End Services Section -->

        <!-- ======= Testimonials Section ======= -->
        @include('frontend.body.testimonials')
       <!-- End Testimonials Section -->

        <!-- ======= Contact Section ======= -->
        @include('frontend.body.contact')
       <!-- End Contact Section -->
    @endsection
