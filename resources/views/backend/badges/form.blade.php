@extends('layouts.backend.master')
@section('title', trans('backend.titles.badges'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('/backend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/select2-bootstrap4.min.css') }}">
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
                <div class="card card-custom example example-compact">
                    @include('backend.includes.form.header', ['page' => 'badges'])
                    <form action="{{ $edit === false ? route('backend.badges.store') : route('backend.badges.update', ['badge' => $badge->id])  }}" method="POST">
                        @csrf
                        @if($edit)
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12"></label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <ul class="nav nav-light-primary nav-pills" role="tablist">
                                        @foreach ($langs as $lang)
                                            <li class="nav-item">
                                                <a class="nav-link @if($loop->first) active @endif" id="tab-{{ $lang->code }}" data-toggle="tab" href="#{{ $lang->code }}">
                                                    <span class="nav-text">{{ $lang->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content mt-5">
                                @foreach ($langs as $lang)
                                    <div class="tab-pane fade @if($loop->first) active show @endif" id="{{ $lang->code }}" role="tabpanel" aria-labelledby="tab-{{ $lang->code }}">
                                        <div class="form-group row">
                                            <label for="name:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.name') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="name:{{ $lang->code }}" type="text" class="form-control @if($errors->has("name:$lang->code")) is-invalid @endif"  name="name:{{ $lang->code }}" value="{{ isset($badge) ? $badge->translate($lang->code)?->name : old('name:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.name')">
                                                    @if ($errors->has("name:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("name:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="slug:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.slug') ({{ strtoupper($lang->code) }})
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="slug:{{ $lang->code }}" type="text" class="form-control @if($errors->has("slug:$lang->code")) is-invalid @endif"name="slug:{{ $lang->code }}" value="{{ isset($badge) ? $badge->translate($lang->code)?->slug : old('slug:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.slug')">
                                                    @if ($errors->has("slug:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("slug:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="bg_color" class="col-form-label text-right col-lg-3 col-sm-12">
                                @lang('backend.labels.badge_border_color')
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <div class="input-group">
                                    <input id="bg_color" type="color" class="form-control @error('border_color') is-invalid @enderror" name="border_color" value="{{ isset($badge) ? $badge->border_color : old('border_color') }}">
                                    @error('border_color')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bg_color" class="col-form-label text-right col-lg-3 col-sm-12">
                                @lang('backend.labels.badge_bg')
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <div class="input-group">
                                    <input id="bg_color" type="color" class="form-control @error('bg_color') is-invalid @enderror" name="bg_color" value="{{ isset($badge) ? $badge->bg_color : old('bg_color') }}">
                                    @error('bg_color')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text_color" class="col-form-label text-right col-lg-3 col-sm-12">
                                @lang('backend.labels.badge_color')
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <div class="input-group">
                                    <input id="text_color" type="color" class="form-control @error('text_color') is-invalid @enderror" name="text_color" value="{{ isset($badge) ? $badge->text_color : old('text_color') }}">
                                    @error('text_color')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="icon" class="col-form-label text-right col-lg-3 col-sm-12">
                                Fontawasome ikonu
                            </label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <div class="input-group">
                                    <input id="icon" type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ isset($badge) ? $badge->icon : old('icon') }}">
                                    @error('icon')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">
                                @lang('backend.labels.status')
                            </label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <div class="input-group">
                                      <span class="switch switch-md switch-icon">
                                          <label>
                                              <input type="checkbox" class="bool" name="status" value="{{ isset($badge) ? $badge->status : old('status') }}"  {{ (isset($badge) ? old('status',$badge->status) : old('status',1) ) == 1 ? 'checked' : '' }}>
                                              <span></span>
                                          </label>
                                      </span>
                                </div>
                            </div>
                        </div>
                        @include('backend.includes.form.footer')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/backend/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            let select2 = $('.select2');
            select2.select2({
                minimumResultsForSearch: 20,
                theme: 'bootstrap4',
                placeholder: 'Axtardığınız'
            });
        });
    </script>
@endsection
