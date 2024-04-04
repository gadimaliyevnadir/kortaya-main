@extends('layouts.backend.master')
@section('title', trans('backend.titles.campaigns'))
@section('styles')
    <link rel="stylesheet" href="{{asset('backend/css/sweetalert.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/datatables.bundle.css')}}">
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.card.header', ['page' => 'campaigns'])
                    <div class="card-body">
                        <table class="table table-responsive table-separate table-head-custom table-checkable" id="datatable">
                            <thead>
                            <tr>
                                <th>@lang('backend.labels.id')</th>
                                <th>@lang('backend.labels.image')</th>
                                <th>@lang('backend.labels.name')</th>
                                <th>@lang('backend.labels.description')</th>
                                <th>@lang('backend.labels.status')</th>
                                <th>@lang('backend.labels.created_at')</th>
                                <th>@lang('backend.labels.actions')</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('backend/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('backend/js/datatables.bundle.js')}}"></script>
    @include('backend.includes.plugins.datatable',['columns'=>['id','image','name','description','status','created_at','actions'], 'route'=>route('backend.campaigns.index')])
@endsection
