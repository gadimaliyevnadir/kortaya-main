@extends('layouts.backend.master')
@section('title', trans('backend.titles.brands'))
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
                    @include('backend.includes.form.header', ['page' => 'brands'])
                    <form
                        action="{{ $edit === false ? route('backend.brands.store') : route('backend.brands.update', ['brand' => $brand->id]) }}"
                        method="POST" enctype="multipart/form-data">
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
                                                <a class="nav-link @if($loop->first) active @endif"
                                                   id="tab-{{ $lang->code }}" data-toggle="tab"
                                                   href="#{{ $lang->code }}">
                                                    <span class="nav-text">{{ $lang->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.name')
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ isset($brand) ? $brand->name : old('name') }}"
                                               placeholder="@lang('backend.placeholders.enter.name')">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="slug" class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.slug')
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input id="slug" type="text"
                                               class="form-control @error('slug') is-invalid @enderror" name="slug"
                                               value="{{ isset($brand) ? $brand->slug : old('slug') }}"
                                               placeholder="@lang('backend.placeholders.enter.slug')">
                                        @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                @foreach ($langs as $lang)
                                    <div class="tab-pane fade @if($loop->first) active show @endif"
                                         id="{{ $lang->code }}" role="tabpanel" aria-labelledby="tab-{{ $lang->code }}">
                                        <div class="form-group row">
                                            <label for="title:{{ $lang->code }}"
                                                   class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.meta_title') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="meta_title:{{ $lang->code }}" type="text"
                                                           class="form-control @if($errors->has("meta_title:$lang->code")) is-invalid @endif"
                                                           name="meta_title:{{ $lang->code }}"
                                                           value="{{ isset($brand) ? $brand->translate($lang->code)?->meta_title : old('meta_title:'.$lang->code) }}"
                                                           placeholder="@lang('backend.placeholders.enter.meta_title')">
                                                    @if ($errors->has("meta_title:$lang->code"))
                                                        <div
                                                            class="invalid-feedback">{{ $errors->first("meta_title:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="meta_keywords:{{ $lang->code }}"
                                                   class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.meta_keywords') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="meta_keywords:{{ $lang->code }}" type="text"
                                                           class="form-control tagify-{{ $lang->code }} @if($errors->has("meta_keywords:$lang->code")) is-invalid @endif"
                                                           name="meta_keywords:{{ $lang->code }}"
                                                           value="{{ isset($brand) ? $brand->translate($lang->code)?->meta_keywords : old('meta_keywords:'.$lang->code) }}"
                                                           placeholder="@lang('backend.placeholders.enter.meta_keywords')">
                                                    @if ($errors->has("meta_keywords:$lang->code"))
                                                        <div
                                                            class="invalid-feedback">{{ $errors->first("meta_keywords:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="meta_description:{{ $lang->code }}"
                                                   class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.meta_description') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="meta_description:{{ $lang->code }}" type="text"
                                                           class="form-control @if($errors->has("meta_description:$lang->code")) is-invalid @endif"
                                                           name="meta_description:{{ $lang->code }}"
                                                           value="{{ isset($brand) ? $brand->translate($lang->code)?->meta_description : old('meta_description:'.$lang->code) }}"
                                                           placeholder="@lang('backend.placeholders.enter.meta_description')">
                                                    @if ($errors->has("meta_description:$lang->code"))
                                                        <div
                                                            class="invalid-feedback">{{ $errors->first("meta_description:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @include('backend.includes.image_row')
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.status')
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                         <span class="switch switch-md switch-icon">
                                             <label>
                                                 <input type="checkbox" class="bool" name="status"
                                                        value="{{ isset($brand) ? $brand->status : old('status') }}"  {{ (isset($brand) ? old('status',$brand->status) : old('status',1) ) == 1 ? 'checked' : '' }}>
                                                 <span></span>
                                             </label>
                                         </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('backend.includes.form.footer')
                    </form>
                </div>
                <div class="card">
                    <div class="card-body">
                        @if ($edit)
                            @include('backend.includes.media',[
                                'model' => $brand,
                                'name'  => 'brand',
                                'media_collection_name'  => 'brand_image',
                                'isDeleted' => true,
                                'isCovered' => false,
                            ])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let key_az = document.querySelector('.tagify-az');
        let key_en = document.querySelector('.tagify-en');
        let key_ru = document.querySelector('.tagify-ru');

        new Tagify(key_az);
        new Tagify(key_en);
        new Tagify(key_ru);
    </script>
@endsection

