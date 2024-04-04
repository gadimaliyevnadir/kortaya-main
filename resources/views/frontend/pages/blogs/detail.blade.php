@extends('frontend.layouts.master')
@section('header')
    @include('frontend.includes.header')
@endsection
@section('content')
    @include('frontend.includes.sections.breadcrumb_content',['title'=>'Blog Details'])
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 m-auto overflow-hidden">
                    <div class="blog-details mb-10">
                        <div class="image mb-6" data-aos="fade-up" data-aos-delay="300">
                            <img class="fit-image" src="{{$blog->first_image}}" alt="Blog">
                        </div>
                        <div class="content" data-aos="fade-up" data-aos-delay="300">
                            <h2 class="title mb-3">{{$blog->name}}</h2>
                            <div class="meta-list mb-3">
                                <span class="meta-item date">{{translation_month($blog->created_at)}}</span>
                            </div>
                            <div class="desc">
                                <p>{{translation_first($blog)->content}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

