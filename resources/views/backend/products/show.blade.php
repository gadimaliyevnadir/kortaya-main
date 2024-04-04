@extends('layouts.backend.master')
@section('title', trans('backend.titles.products'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'products', 'id' => $product->id])
                    @include('backend.products.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'products', 'id' => ['product' => $product->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
