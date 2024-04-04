<div class="tab-pane fade @if($loop->first) active show @endif" id="statuses" role="tabpanel" aria-labelledby="tab-statuses">
    <div class="form-group row">
        <label for="statuses" class="col-form-label text-right col-lg-3 col-sm-12">
            @lang('backend.labels.product_status')
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <select id="statuses" class="select2 form-control @error('statuses') is-invalid @enderror" name="statuses[]" multiple>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->id }}"
                                @if(isset($product) && $product->productStatuses->contains($status->id)) selected @endif
                                @if(in_array($status->id, old('statuses',[]))) selected @endif >
                            {{ translation($status)->name }}
                        </option>
                    @endforeach
                </select>
                @error('statuses')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>
