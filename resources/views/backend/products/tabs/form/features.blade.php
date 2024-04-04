<div class="tab-pane fade @if($loop->first) active show @endif" id="features" role="tabpanel" aria-labelledby="tab-features">
{{--    <div class="form-group row">--}}
{{--        <label class="col-form-label text-right col-lg-3 col-sm-12">--}}
{{--            @lang('backend.labels.price')--}}
{{--            <span class="text-danger">*</span>--}}
{{--        </label>--}}
{{--        <div class="col-lg-6 col-md-9 col-sm-12">--}}
{{--            <div class="input-group">--}}
{{--                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ isset($product) ? $product->price : old('price') }}" placeholder="@lang('backend.placeholders.enter.price')" step=0.01>--}}
{{--                @error('price')--}}
{{--                    <div class="invalid-feedback">{{ $message }}</div>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="form-group row">--}}
{{--        <label class="col-form-label text-right col-lg-3 col-sm-12">--}}
{{--            @lang('backend.labels.discount_price')--}}
{{--        </label>--}}
{{--        <div class="col-lg-6 col-md-9 col-sm-12">--}}
{{--            <div class="input-group">--}}
{{--                <input type="number" class="form-control @error('discount_price') is-invalid @enderror"--}}
{{--                       name="discount_price"--}}
{{--                       value="{{ isset($product) ? $product->discount_price  : old('discount_number') }}"--}}
{{--                       placeholder="@lang('backend.placeholders.enter.discount_price')" step=0.01>--}}
{{--                @error('discount_price')--}}
{{--                    <div class="invalid-feedback">{{ $message }}</div>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.weight')
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ isset($product) ? $product->weight : old('weight') }}" placeholder="@lang('backend.placeholders.enter.weight')" step=0.01>
                @error('weight')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.length')
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input type="number" class="form-control @error('length') is-invalid @enderror" name="length" value="{{ isset($product) ? $product->length : old('length') }}" placeholder="@lang('backend.placeholders.enter.length')" step=0.01>
                @error('length')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.height')
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input type="number" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ isset($product) ? $product->height : old('height') }}" placeholder="@lang('backend.placeholders.enter.height')" step=0.01>
                @error('height')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.width')
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input type="number" class="form-control @error('width') is-invalid @enderror" name="width" value="{{ isset($product) ? $product->width : old('width') }}" placeholder="@lang('backend.placeholders.enter.width')" step=0.01>
                @error('width')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.maximum_quantity')
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input type="number" class="form-control @error('maximum_quantity') is-invalid @enderror"
                       name="maximum_quantity" value="{{ isset($product) ? $product->maximum_quantity : old('maximum_quantity') }}"
                       placeholder="@lang('backend.labels.maximum_quantity')" >
                @error('maximum_quantity')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.slug')
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                       name="slug" value="{{ isset($product) ? $product->slug : old('slug') }}"
                       placeholder="@lang('backend.placeholders.enter.slug')">
                @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.images')
            @if(!$edit)
                <span class="text-danger">*</span>
            @endif
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image[]"
                           accept="image/*" multiple>
                    <label class="custom-file-label">
                        @lang('backend.placeholders.choose.images')
                    </label>
                </div>
                @error('image.*')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            Outlet məhsuldur
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <span class="switch switch-md switch-icon">
                    <label>
                        <input type="checkbox" class="bool" name="outlet" value="{{ isset($product) ? $product->outlet : old('outlet') }}" {{ isset($product) && $product->outlet === 1 ? 'checked' : '' }}>
                        <span></span>
                    </label>
                </span>
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
                        <input type="checkbox" class="bool" name="status" value="{{ isset($product) ? $product->status : old('status') }}"  {{ (isset($product) ? old('status',$product->status) : old('status',1) ) == 1 ? 'checked' : '' }}>
                        <span></span>
                    </label>
                </span>
            </div>
        </div>
    </div>

</div>
