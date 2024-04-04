<div class="tab-pane fade @if($loop->first) active show @endif" id="badges" role="tabpanel" aria-labelledby="tab-badges">
    <div class="form-group row">
        <label for="badges" class="col-3 col-form-label text-right">
            @lang('backend.labels.badges')
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <select id="badges" class="select2 form-control @error('badges') is-invalid @enderror" name="badges[]" multiple>
                    @foreach ($badges as $badge)
                        <option value="{{ $badge->id }}"
                                @if(isset($product) && $product->badges->contains($badge->id)) selected @endif
                                @if(in_array($badge->id, old('badges',[]))) selected @endif >
                            {{ translation($badge)->name }}
                        </option>
                    @endforeach
                </select>
                @error('badges')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>
