<div class="tab-pane fade @if($loop->first) active show @endif" id="seo" role="tabpanel" aria-labelledby="tab-seo">
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12"></label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <ul class="nav nav-light-primary nav-pills" role="tablist">
                @foreach ($langs as $lang)
                    <li class="nav-item">
                        <a class="nav-link @if($loop->first) active @endif" id="tab-seo-{{ $lang->code }}" data-toggle="tab" href="#seo-{{ $lang->code }}">
                            <span class="nav-text">{{ $lang->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="tab-content">
        @foreach ($langs as $lang)
            <div class="tab-pane fade @if($loop->first) active show @endif" id="seo-{{ $lang->code }}" role="tabpanel" aria-labelledby="tab-seo-{{ $lang->code }}">
                <div class="form-group row">
                    <label for="meta_title:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                        @lang('backend.labels.meta_title') ({{ strtoupper($lang->code) }})
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <div class="input-group">
                            <input id="meta_title:{{ $lang->code }}" type="text"
                                   class="form-control @if($errors->has("meta_title:$lang->code")) is-invalid @endif"
                                   name="meta_title:{{ $lang->code }}"
                                   value="{{ isset($product) ? $product->translate($lang->code)?->meta_title : old('meta_title:'.$lang->code) }}"
                                   placeholder="@lang('backend.placeholders.enter.meta_title')">
                            @if ($errors->has("meta_title:$lang->code"))
                                <div class="invalid-feedback">{{ $errors->first("meta_title:$lang->code") }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="meta_keywords:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                        @lang('backend.labels.meta_keywords') ({{ strtoupper($lang->code) }})
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <div class="input-group">
                            <input id="meta_keywords:{{ $lang->code }}" type="text"
                                   class="form-control tagify-{{ $lang->code  }} @if($errors->has("meta_keywords:$lang->code")) is-invalid @endif"
                                   name="meta_keywords:{{ $lang->code }}"
                                   value="{{ isset($product) ? $product->translate($lang->code)?->meta_keywords : old('meta_keywords:'.$lang->code) }}"
                                   placeholder="@lang('backend.placeholders.enter.meta_keywords')">
                            @if ($errors->has("meta_keywords:$lang->code"))
                                <div class="invalid-feedback">{{ $errors->first("meta_keywords:$lang->code") }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="meta_description:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                        @lang('backend.labels.meta_description') ({{ strtoupper($lang->code) }})
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <div class="input-group">
                            <input id="meta_description:{{ $lang->code }}" type="text"
                                   class="form-control @if($errors->has("meta_description:$lang->code")) is-invalid @endif"
                                   name="meta_description:{{ $lang->code }}"
                                   value="{{ isset($product) ? $product->translate($lang->code)?->meta_description : old('meta_description:'.$lang->code) }}"
                                   placeholder="@lang('backend.placeholders.enter.meta_description')">
                            @if ($errors->has("meta_description:$lang->code"))
                                <div class="invalid-feedback">{{ $errors->first("meta_description:$lang->code") }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
