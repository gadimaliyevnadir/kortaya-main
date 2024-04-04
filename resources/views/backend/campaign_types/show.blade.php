@extends('layouts.backend.master')
@section('title', trans('backend.titles.campaign_types'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'campaign_types', 'id' => $campaign_type->id])
                    @include('backend.campaign_types.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'campaign_types', 'id' => ['campaign_type' => $campaign_type->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
