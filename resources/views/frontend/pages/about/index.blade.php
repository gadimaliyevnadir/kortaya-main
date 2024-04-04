@extends('frontend.layouts.master')
@section('header')
    @include('frontend.includes.header')
@endsection
@section('content')
    @include('frontend.includes.sections.breadcrumb_content',['title'=>'About Us'])
    <div class="section section-margin overflow-hidden">
        <div class="container">
            <div class="row mb-n6">
                <div class="col-lg-6 align-self-center mb-6" data-aos="fade-right" data-aos-delay="600">
                    <div class="about_content">
                        <h2 class="title">{{translation($settings_about->where('code','about_us')->first())->title}}</h2>
{{--                        <h3 class="sub-title">We believe that every project existing in digital world is a result of an--}}
{{--                            idea and every idea has a cause.</h3>--}}
                        <p>{{translation($settings_about->where('code','about_us')->first())->content}}</p>
                    </div>
                </div>
                <div class="col-lg-6 mb-6" data-aos="fade-left" data-aos-delay="600">
                    <div class="about_thumb">
                        <img class="fit-image" src="{{$settings_about->where('code','about_us')->first()->first_image}}" alt="About Image">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section about-feature-bg section-padding">
        <div class="container">
            <div class="row mb-n5">
                @foreach($settings_about->whereIn('code', ['free_shipping', 'support', 'money_return', 'onevery_order']) as $index=>$setting_item)
                    <div class="col-lg-3 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="{{$index}}00">
                        <div class="feature flex-column text-center">
                            <div class="icon w-100 mb-4">
                                <img src="{{$setting_item->first_image}}" alt="Feature Icon">
                            </div>
                            <div class="content ps-0 w-100">
                                <h5 class="title mb-2">{{translation($setting_item)->title}}</h5>
                                <p>{{translation($setting_item)->content}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="section section-margin">
        <div class="container">
            <div class="row mb-n6">
                @foreach($settings_about->whereIn('code', ['history_of_us', 'our_mission', 'what_do_we_do']) as $index=>$setting_item)
                <div class="col-lg-4 col-md-6 text-center mb-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="single-service">
                        <h2 class="title">{{translation($setting_item)->title}}</h2>
                        <p>{{translation($setting_item)->content}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('frontend.includes.sections.brands')
@endsection

