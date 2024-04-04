@extends('layouts.backend.master')
@section('title', trans('backend.titles.badges'))
@section('styles')
    <link rel="stylesheet" href="{{asset('backend/css/sweetalert.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/datatables.bundle.css')}}">
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">@lang("backend.titles.badges")</h3>
                        </div>
                        @can("product-badges create")
                            <div class="card-toolbar">
                                <a href="{{ route("backend.badges.create") }}" class="btn btn-primary font-weight-bolder">
                                    <i class="la la-plus"></i> @lang('backend.buttons.create')
                                </a>
                            </div>
                        @endcan
                    </div>
                    @include('backend.badges.tables.index')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('backend/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('backend/js/datatables.bundle.js')}}"></script>
    @include('backend.includes.plugins.datatable',['columns'=>['id','name','status','created_at','actions'], 'route'=>route('backend.badges.index')])
@endsection
