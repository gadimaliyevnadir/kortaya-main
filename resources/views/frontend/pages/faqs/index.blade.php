@extends('frontend.layouts.master')
@section('header')
    @include('frontend.includes.header')
@endsection
@section('content')
    <!-- @include('frontend.includes.sections.breadcrumb_content', ['title' => 'FAQ']) -->
    <section class="recent-view-max">

        <div class="breadcrumb-section-new faq">
            <p>Home / <span>FAQ</span></p>
        </div>
        <div class="section ">
            <div class="faq_content_area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="faq_content_wrapper" data-aos="fade-up" data-aos-delay="300">
                                <h4 class="title">Frequently Asked Questions</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
    
            <div class="accordion_area">
                <div class="">
                    <div class="row">
                        <div class="col-12">
                            <div class="custom-accordion">
                                @foreach($faqs as $index => $faq)
                                    <div class="custom-accordion-item">
                                        <div class="custom-accordion-header">
                                            <h6>{{translation($faq)->question}}</h6>
                                            <img src="{{asset('frontend/assets/images/test/downcard.svg')}}" alt="">
                                        </div>
                                        <div class="custom-accordion-content">
                                            {{translation($faq)->answer}}
                                        </div>
                                    </div>  
                                @endforeach                          
                            </div>
    </section>
                        <!-- <div id="accordionExample" class="accordion mb-n4">
                            @foreach($faqs as $index => $faq)
                                <div class="card_dipult accordion-item mb-4" data-aos="fade-up" data-aos-delay="{{$index + 1}}00">
                                    <div class="card-header card_accor" id="heading_{{$index}}">
                                        <button class="btn btn-link collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapse_{{$index}}" aria-expanded="false" aria-controls="collapseTwo">
                                            {{translation($faq)->question}}
                                            <i class="fa fa-plus"></i>
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <div id="collapse_{{$index}}" class="collapse accordion-collapse border-0"
                                         aria-labelledby="heading_{{$index}}" data-bs-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>{{translation($faq)->answer}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>
@endsection

