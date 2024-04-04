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
