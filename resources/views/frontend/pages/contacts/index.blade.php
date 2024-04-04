@extends('frontend.layouts.master')
@section('header')
    @include('frontend.includes.header')
@endsection
@section('content')
    @include('frontend.includes.sections.breadcrumb_content',['title'=>'Contact Us'])
    <div class="section section-margin">
        <div class="container">
            <div class="row mb-n10">
                @include('frontend.pages.contacts.sections.form')
                <div class="col-12 col-lg-4 mb-10">
                    <div class="section-title" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="title pb-3">Contact Info</h2>
                        <span></span>
                        <div class="title-border-bottom"></div>
                    </div>
                    <div class="row contact-info-wrapper mb-n6">
                        <div class="col-lg-12 col-md-6 col-sm-12 col-12 single-contact-info mb-6" data-aos="fade-up"
                             data-aos-delay="300">
                            <div class="single-contact-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="single-contact-title-content">
                                <h4 class="title">Postal Address</h4>
                                <p class="desc-content">{{settings('location')}}</p>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12 col-12 single-contact-info mb-6" data-aos="fade-up"
                             data-aos-delay="400">
                            <div class="single-contact-icon">
                                <i class="fa fa-mobile"></i>
                            </div>
                            <div class="single-contact-title-content">
                                <h4 class="title">Contact Us Anytime</h4>
                                <p class="desc-content">Mobile: {{settings('phone')}}</p>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12 col-12 single-contact-info mb-6" data-aos="fade-up"
                             data-aos-delay="500">
                            <div class="single-contact-icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="single-contact-title-content">
                                <h4 class="title">Support Overall</h4>
                                <p class="desc-content"><a href="#">{{settings('email')}}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section" data-aos="fade-up" data-aos-delay="300">
        <div class="google-map-area w-100">
            <iframe class="contact-map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2136.986005919501!2d-73.9685579655238!3d40.75862446708152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c258e4a1c884e5%3A0x24fe1071086b36d5!2sThe%20Atrium!5e0!3m2!1sen!2sbd!4v1585132512970!5m2!1sen!2sbd"></iframe>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('main/contact.js')}}"></script>
@endsection
