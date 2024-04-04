@extends('layouts.backend.master')
@section('title', trans('backend.titles.brands'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'brands', 'id' => $brand->id])
                    @include('backend.brands.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'brands', 'id' => ['brand' => $brand->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
