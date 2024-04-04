@extends('frontend.layouts.master')
@section('header')
    @include('frontend.includes.header')
@endsection
@section('content')
    @include('frontend.includes.sections.breadcrumb_content',['title'=>'Blog'])
    <div class="section section-margin">
        <div class="container">
            <div class="row mb-n8">
                @foreach($blogs as $index=>$blog)
                <div class="col-md-6 col-lg-4 mb-8" data-aos="fade-up" data-aos-delay="{{$index + 1}}00">
                    <div class="blog-single-post-wrapper">
                        <div class="blog-thumb">
                            <a class="blog-overlay" href="{{route('frontend.blog.detail',['blog'=>$blog])}}">
                                <img src="{{$blog->first_image}}" alt="Blog Post">
                            </a>
                        </div>
                        <div class="blog-content">
                            <div class="post-meta">
                                <span>{{translation_month($blog->created_at)}}</span>
                            </div>
                            <h3 class="title"><a href="">{{$blog->name}}</a></h3>
                            <p>{{translation_first($blog)->content}}</p>
                            <a href="{{route('frontend.blog.detail',['blog'=>$blog])}}" class="link">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row mb-2 mb-lg-0">
                <div class="col" data-aos="fade-up" data-aos-delay="300">
                    <nav class="mt-8 pt-8 border-top d-flex justify-content-center">
                        @include('frontend.layouts.pagination_two',['items'=>$blogs])
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

