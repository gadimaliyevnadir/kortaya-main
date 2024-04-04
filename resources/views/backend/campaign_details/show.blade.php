@extends('layouts.backend.master')
@section('title', trans('backend.titles.menus'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'campaign_details', 'id' => $campaign_detail->id])
                    @include('backend.campaign_details.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'campaign_details', 'id' => ['campaign_detail' => $campaign_detail->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
