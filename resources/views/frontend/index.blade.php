@extends('frontend.layouts.master')
@section('header')
    @include('frontend.includes.header')
@endsection
@section('content')
    @include('frontend.includes.sections.slider')
  <div class="contents">
    @include('frontend.includes.sections.two_products')
    <!-- @include('frontend.includes.sections.four_points') -->
    @include('frontend.includes.sections.statuses')
    @include('frontend.includes.sections.statuses_two')
    @include('frontend.includes.sections.banner')
    @include('frontend.includes.sections.featured')
    @include('frontend.includes.sections.discount_section')
    @include('frontend.includes.sections.brands_new')
    @include('frontend.includes.sections.weekly')
  </div>
    {{-- @include('frontend.includes.sections.options_section') --}}
@endsection
@section('scripts')
@endsection
