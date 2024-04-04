@extends('layouts.backend.master')
@section('title', trans('backend.titles.products'))
@section('styles')
    <link rel="stylesheet" href="{{asset('backend/css/sweetalert.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/datatables.bundle.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/select2-bootstrap4.min.css')}}">
    <style>
        .select2 {
            width:100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.card.header', ['page' => 'products'])
                    @include('backend.products.tables.index')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('backend/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('backend/js/datatables.bundle.js')}}"></script>
    <script src="{{asset('backend/js/select2.min.js')}}"></script>
    @include('backend.products.scripts.index')
    <script>
        $(document).ready(function() {
       $('.select2').select2({
                theme: 'bootstrap4',
                minimumResultsForSearch: 20,
                placeholder: 'Axtardığınız'
            });
        });
    </script>
@endsection
