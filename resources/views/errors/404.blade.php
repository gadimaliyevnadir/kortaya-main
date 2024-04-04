@extends('frontend.layouts.master')
@section('header')
    @include('frontend.includes.header')
@endsection
@section('content')
    <div class="section">

        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">404 Error</h1>
                    <ul>
                        <li>
                            <a href="{{route('frontend.dashboard')}}">Home </a>
                        </li>
                        <li class="active"> 404 Error</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="error_form">
                        <h1 class="title">404</h1>
                        <h2 class="sub-title">Opps! PAGE NOT BE FOUND</h2>
                        <p>Sorry but the page you are looking for does not exist, have been<br>
                            removed, name changed or is temporarily unavailable.</p>
                        <form class="search-form-error mb-8" action="#">
                            <input class="input-text" placeholder="Search..." type="text">
                            <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        <a href="{{route('frontend.dashboard')}}" class="btn btn-primary btn-hover-dark rounded-0">Back to home page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
