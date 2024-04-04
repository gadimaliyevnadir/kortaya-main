@extends('layouts.backend.master')
@section('title', trans('backend.titles.product-statuses'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'product-statuses', 'id' => $product_status->id])
                    @include('backend.product_statuses.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'product-statuses', 'id' => ['product_status' => $product_status->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
