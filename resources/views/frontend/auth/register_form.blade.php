@extends('frontend.layouts.master')
@section('header')
    @include('frontend.includes.header')
@endsection
@section('content')
    <div class="section">
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Register</h1>
                    <ul>
                        <li>
                            <a href="">Home </a>
                        </li>
                        <li class="active">Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-margin">
        <div class="container container-register-zezeya">
            <div class="row mb-n10 justify-content-center">
                @include('frontend.auth.sections.register_form_inputs')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('main/auth/register.js')}}"></script>
@endsection
