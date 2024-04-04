@extends('layouts.backend.master')
@section('title', trans('backend.titles.campaign_belongs'))
@section('styles')
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div id="app" class="container">
                <div class="card card-custom example example-compact">
                    @include('backend.includes.form.header', ['page' => 'campaign_belongs'])
                    <form action="{{ $edit === false ? route('backend.campaign_belongs.store') : route('backend.campaign_belongs.update', ['campaign_belong' => $campaign_belong->id])  }}"
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
                            <div class="tab-content mt-5">
                                @foreach ($langs as $lang)
                                    <div class="tab-pane fade @if($loop->first) active show @endif"
                                         id="{{ $lang->code }}" role="tabpanel" aria-labelledby="tab-{{ $lang->code }}">
                                        <div class="form-group row">
                                            <label for="name:{{ $lang->code }}"
                                                   class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.name') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="name:{{ $lang->code }}" type="text"
                                                           class="form-control @if($errors->has("name:$lang->code")) is-invalid @endif"
                                                           name="name:{{ $lang->code }}"
                                                           value="{{ isset($campaign_belong) ? $campaign_belong->translate($lang->code)?->name : old('name:'.$lang->code) }}"
                                                           placeholder="@lang('backend.placeholders.enter.name')"
                                                           >
                                                    @if ($errors->has("name:$lang->code"))
                                                        <div
                                                            class="invalid-feedback">{{ $errors->first("name:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.status')
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                         <span class="switch switch-md switch-icon">
                                             <label>
                                                 <input type="checkbox" class="bool" name="status" value="{{ isset($campaign_belong) ? $campaign_belong->status : 1 }}" @if(isset($campaign_belong) && $campaign_belong->status) checked @endif checked>
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
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
