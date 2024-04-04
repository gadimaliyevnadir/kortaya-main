@extends('layouts.backend.master')
@section('title', trans('backend.titles.contacts'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    @include('backend.includes.table.header', ['page' => 'contacts', 'id' => $contact->id])
                    @include('backend.contacts.tables.show')
                    <div class="card-footer">
                        <div class="row">
                            <div class="mx-auto">
                                <a href="{{ url()->previous() }}" class="btn btn-danger">
                                    @lang('backend.buttons.back')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
