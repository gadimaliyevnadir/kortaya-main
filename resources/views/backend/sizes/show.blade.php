@extends('layouts.backend.master')
@section('title', trans('backend.titles.colors'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'colors', 'id' => $color->id])
                    @include('backend.colors.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'colors', 'id' => ['color' => $color->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
