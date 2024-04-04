@extends('layouts.backend.master')
@section('title', trans('backend.titles.product-days'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'product-days', 'id' => $product_day->id])
                    @include('backend.product_days.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'product-days', 'id' => ['product_day' => $product_day->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
