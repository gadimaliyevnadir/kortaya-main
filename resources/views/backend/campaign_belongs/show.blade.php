@extends('layouts.backend.master')
@section('title', trans('backend.titles.campaign_belongs'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'campaign_belongs', 'id' => $campaign_belong->id])
                    @include('backend.campaign_belongs.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'campaign_belongs', 'id' => ['campaign_belong' => $campaign_belong->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
