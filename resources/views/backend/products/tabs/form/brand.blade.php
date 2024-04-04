<div class="tab-pane fade @if($loop->first) active show @endif" id="brand" role="tabpanel" aria-labelledby="tab-brand">
    <div class="form-group row">
        <label for="brand_id" class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.brand')
            <span class="text-danger">*</span>
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <select id="brand_id" class="select2 form-control @error('brand_id') is-invalid @enderror" name="brand_id">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand_id',$product->brand_id ?? '') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
                @error('brand_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>
