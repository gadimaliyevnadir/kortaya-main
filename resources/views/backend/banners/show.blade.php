@extends('layouts.backend.master')
@section('title', trans('backend.titles.banners'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'banners', 'id' => $banner->id])
                    @include('backend.banners.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'banners', 'id' => ['banner' => $banner->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
