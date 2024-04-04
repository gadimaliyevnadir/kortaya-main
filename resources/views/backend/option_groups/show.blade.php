@extends('layouts.backend.master')
@section('title', trans('backend.titles.option-groups'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'option-groups', 'id' => $option_group->id])
                    @include('backend.option_groups.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'option-groups', 'id' => ['option_group' => $option_group->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
