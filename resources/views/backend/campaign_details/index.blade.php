@extends('layouts.backend.master')
@section('title', trans('backend.titles.campaign_details'))
@section('styles')
    <link rel="stylesheet" href="{{asset('backend/css/sweetalert.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/datatables.bundle.css')}}">
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.card.header', ['page' => 'campaign_details'])
                    <div class="card-body">
                        <table class="table table-separate table-head-custom table-checkable" id="datatable">
                            <thead>
                            <tr>
                                <th>@lang('backend.labels.id')</th>
                                <th>@lang('backend.labels.campaign_name')</th>
                                <th>@lang('backend.labels.started_at')</th>
                                <th>@lang('backend.labels.ended_at')</th>
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
    @include('backend.includes.plugins.datatable',['columns'=>['id','campaign_name','started_at','ended_at','actions'], 'route'=>route('backend.campaign_details.index')])
@endsection
