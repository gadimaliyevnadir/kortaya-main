@extends('layouts.backend.master')
@section('title', trans('backend.titles.types'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'types', 'id' => $type->id])
                    @include('backend.types.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'types', 'id' => ['type' => $type->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
