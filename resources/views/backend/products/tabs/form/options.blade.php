<div class="tab-pane fade @if($loop->first) active show @endif" id="options" role="tabpanel" aria-labelledby="tab-options">
    <div class="form-group row">
        <label for="productOptions" class="col-3 col-form-label text-right">
            @lang('backend.labels.options')
       </label>

        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="input-group">
                <select id="productOptions" class="select2 form-control @error('options') is-invalid @enderror"
                        name="options[]" multiple="multiple">
                    @foreach (!isset($product) ? $optionGroups : $product->category->options as $optionGroup)
                        <optgroup label="{{translation_first($optionGroup)->name }}">
                           @foreach($optionGroup->options as $option)
                                <option value="{{ $option->id }}"
                                        @if(isset($product) && $product->options->contains($option->id))  selected @endif
                                        @if(in_array($option->id, old('options',[]))) selected @endif >
                                    {{ translation_first($option)->name }}
                                </option>
                               @endforeach
                        </optgroup>
                    @endforeach
                </select>
                @error('options')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </div>
</div>
