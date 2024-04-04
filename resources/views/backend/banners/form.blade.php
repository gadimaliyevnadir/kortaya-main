@extends('layouts.backend.master')
@section('title', trans('backend.titles.banners'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom example example-compact">
                    @include('backend.includes.form.header', ['page' => 'banners'])
                    <form action="{{ $edit === false ? route('backend.banners.store') :  route('backend.banners.update', ['banner' => $banner->id]) }}"
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
                                                <a class="nav-link @if($loop->first) active @endif" id="tab-{{ $lang->code }}" data-toggle="tab" href="#{{ $lang->code }}">
                                                    <span class="nav-text">{{ $lang->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content">
                                @foreach ($langs as $lang)
                                    <div class="tab-pane fade @if($loop->first) active show @endif" id="{{ $lang->code }}"
                                         role="tabpanel" aria-labelledby="tab-{{ $lang->code }}">
                                        <div class="form-group row">
                                            <label for="name:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.name') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="name:{{ $lang->code }}" type="text"
                                                           class="form-control @if($errors->has("name:$lang->code")) is-invalid @endif"
                                                           name="name:{{ $lang->code }}"
                                                           value="{{ isset($banner) ? $banner->translate($lang->code)?->name : old('name:'.$lang->code) }}"
                                                           placeholder="@lang('backend.labels.name')">
                                                    @if ($errors->has("name:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("name:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="text:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.content') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="text:{{ $lang->code }}" type="text"
                                                           class="form-control @if($errors->has("text:$lang->code")) is-invalid @endif"
                                                           name="text:{{ $lang->code }}"
                                                           value="{{ isset($banner) ? $banner->translate($lang->code)?->text : old('text:'.$lang->code) }}"
                                                           placeholder="@lang('backend.labels.content')">
                                                    @if ($errors->has("text:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("text:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.image')
                                    @if(!$edit)
                                        <span class="text-danger">*</span>
                                    @endif
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                                   name="image[]" multiple="multiple" accept="image/*">
                                            <label class="custom-file-label">
                                                @lang('backend.placeholders.choose.image')
                                            </label>
                                        </div>
                                        @error('image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="link" class="col-form-label text-right col-lg-3 col-sm-12">
                                     Link
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ isset($banner) ? $banner->link : old('link')  }}">
                                        </div>
                                        @error('link')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="banner_type" class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.banner_type')
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <select id="banner_type" name="banner_type"
                                                class="form-control @if($errors->has('banner_type')) is-invalid @endif">
                                            <option value="1" {{ isset($banner) && $banner->banner_type == 1 ? 'selected' : '' }}>First</option>
                                            <option value="2" {{ isset($banner) && $banner->banner_type == 2 ? 'selected' : '' }}>Second</option>
                                            <option value="3" {{ isset($banner) && $banner->banner_type == 3 ? 'selected' : '' }}>Third</option>
                                        </select>
                                        @if ($errors->has('banner_type'))
                                            <div class="invalid-feedback">{{ $errors->first('banner_type') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="order" class="col-form-label text-right col-lg-3 col-sm-12">
                                    Sıra
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input id="order" type="text" class="form-control @if($errors->has("order")) is-invalid @endif" name="order" value="{{ isset($banner) ? $banner->order : old('order') }}">
                                        @if ($errors->has("order"))
                                            <div class="invalid-feedback">{{ $errors->first("order") }}</div>
                                        @endif
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
                                                 <input type="checkbox" class="bool" name="status" value="{{ isset($banner) ? $banner->status : old('status') }}"  {{ (isset($banner) ? old('status',$banner->status) : old('status',1) ) == 1 ? 'checked' : '' }}>
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
                                'model' => $banner,
                                'name'  => 'banner',
                                'media_collection_name'  => 'banner_image',
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
