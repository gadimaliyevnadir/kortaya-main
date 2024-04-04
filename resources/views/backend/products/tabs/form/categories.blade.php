<div class="tab-pane fade @if($loop->first) active show @endif" id="categories" role="tabpanel" aria-labelledby="tab-categories">
    <div class="form-group row" id="catsApp">
        <label for="category_id" class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.category')
            <span class="text-danger">*</span>
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <select id="category_id" class="form-control @error('category_id') is-invalid @enderror"
                        name="category_id">
                    <option value="">@lang('backend.placeholders.select.category')</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id',$product->category_id ?? '') == $category->id ? 'selected' : '' }}
                        >
                            {{ translation_first($category)->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>
