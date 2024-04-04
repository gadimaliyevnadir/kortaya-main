@extends('layouts.backend.master')
@section('title', trans('backend.titles.badges'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'badges', 'id' => $badge->id])
                    @include('backend.badges.tables.show')
                    @include('backend.includes.table.footer', ['page' => 'badges', 'id' => ['badge' => $badge->id]])
                </div>
            </div>
        </div>
    </div>
@endsection
