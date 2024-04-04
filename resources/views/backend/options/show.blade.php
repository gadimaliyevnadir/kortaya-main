@extends('layouts.backend.master')
@section('title', trans('backend.titles.options'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'options', 'id' => $option->id])
                    @include('backend.options.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'options', 'id' => ['option' => $option->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
