@extends('layouts.backend.master')
@section('title', trans('backend.titles.colors'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('/backend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/select2-bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card card-custom example example-compact">
                    @include('backend.includes.form.header', ['page' => 'colors'])
                    <form action="{{ $edit === false ? route('backend.colors.store') : route('backend.colors.update', ['color' => $color->id])  }}" method="POST">
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
                                                    <input id="name:{{ $lang->code }}" type="text" class="form-control @if($errors->has("name:$lang->code")) is-invalid @endif"  name="name:{{ $lang->code }}" value="{{ isset($color) ? $color->translate($lang->code)?->name : old('name:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.name')">
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
                                                    <input id="slug:{{ $lang->code }}" type="text" class="form-control @if($errors->has("slug:$lang->code")) is-invalid @endif"name="slug:{{ $lang->code }}" value="{{ isset($color) ? $color->translate($lang->code)?->slug : old('slug:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.slug')">
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
                                @lang('backend.labels.color_code')
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <div class="input-group">
                                    <input id="color_code" type="color" class="form-control @error('color_code') is-invalid @enderror"
                                           name="color_code" value="{{ isset($color) ? $color->color_code : old('color_code') }}">
                                    @error('color_code')
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
                                              <input type="checkbox" class="bool" name="status" value="{{ isset($color) ? $color->status : old('status') }}"  {{ (isset($color) ? old('status',$color->status) : old('status',1) ) == 1 ? 'checked' : '' }}>
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
@endsection
