<div class="tab-pane fade @if($loop->first) active show @endif" id="combinations" role="tabpanel"
     aria-labelledby="tab-combinations">
    <div id="colorsApp">
        <h1>Kombinasiyalar</h1>
        <div class="options">
            @if(isset($edit) && $edit == true && $product)
                @foreach($product?->combinations as $index=>$color_item)
                    <div class="option mt-2" data-option-id="{{$index +1}}">
{{--                        <div class="col">--}}
{{--                            <label class="text-left" for="color_id"> Rəng </label>--}}
{{--                            <select id="color_id" class="form-control" name="colors[{{$index +1}}][color_id]">--}}
{{--                                <option disabled="" value="">Seçin</option>--}}
{{--                                @foreach($colors as $color)--}}
{{--                                    <option value="{{$color->id}}" @if($color_item->pivot->color_id == $color->id) selected @endif--}}
{{--                                    >{{translation_first($color)->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="col">--}}
{{--                            <label class="text-left" for="type"> Tipi</label>--}}
{{--                            <select id="type_id" class="form-control" name="colors[{{$index +1}}][type_id]">--}}
{{--                                <option disabled="" value="">Seçin</option>--}}
{{--                                @foreach($types as $type)--}}
{{--                                    <option value="{{$type->id}}"  @if($color_item->pivot->type_id == $type->id) selected @endif--}}
{{--                                    >{{translation_first($type)->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div class="col">
                            <label class="text-left" for="type"> Ölçüsü </label>
                            <select id="size_id" class="form-control" name="colors[{{$index +1}}][size_id]">
                                <option disabled="" value="">Seçin</option>
                                @foreach($sizes as $size)
                                    <option value="{{$size->id}}"  @if($color_item->pivot->size_id == $size->id) selected @endif
                                    >{{translation_first($size)->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="price">
                                    Qiymət
                                </label>
                                <input id="price" type="text" class="form-control" value="{{$color_item->pivot->price}}" name="colors[{{$index +1}}][price]">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="discount">
                                    Endirim
                                </label>
                                <input id="discount" type="text" class="form-control"
                                       value="{{$color_item->pivot->discount_price}}" name="colors[{{$index +1}}][discount]">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="discount_rate">
                                    Endirim faizi
                                </label>
                                <input id="discount_rate" type="text" class="form-control"
                                       value="{{$color_item->pivot->discount_rate}}" name="colors[{{$index +1}}][discount_rate]">
                            </div>
                        </div>
                        <div class="col">
                            <label class="text-left" for="stock"> Stok </label>
                            <select id="stock" class="form-control" name="colors[{{$index +1}}][stock]">
                                <option value="1"   @if($color_item->pivot->stock == '1') selected @endif >Stokda var</option>
                                <option value="0" @if($color_item->pivot->stock == '0') selected @endif>Stokda yoxdur</option>
                            </select>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="code">
                                    Kod
                                </label>
                                <input id="code" type="text"  value="{{$color_item->pivot->code}}"  class="form-control"
                                       name="colors[{{$index +1}}][code]">
                            </div>
                        </div>
                        <div class="col">
                            <label class="text-left" for="status_color"> Status </label>
                            <select id="status_color" class="form-control" name="colors[{{$index +1}}][status_color]">
                                <option value="0" @if($color_item->pivot->status == '0') selected @endif >Simple</option>
                                <option value="1" @if($color_item->pivot->status == '1') selected @endif>Main</option>
                            </select>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="code">
                                </label>
                                <a class="btn btn-success mt-8 delete_btn_a"><i class="fa fa-minus"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <div class="option mt-2" data-option-id="1">
{{--                <div class="col">--}}
{{--                    <label class="text-left" for="color_id"> Rəng </label>--}}
{{--                    <select id="color_id" class="form-control" name="colors[1][color_id]">--}}
{{--                        <option disabled="" value="">Seçin</option>--}}
{{--                        @foreach($colors as $color)--}}
{{--                            <option value="{{$color->id}}">{{translation_first($color)->name}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                        <label class="text-left" for="type"> Tipi </label>--}}
{{--                    <select id="type_id" class="form-control" name="colors[1][type_id]">--}}
{{--                        <option disabled="" value="">Seçin</option>--}}
{{--                        @foreach($types as $type)--}}
{{--                            <option value="{{$type->id}}">{{translation_first($type)->name}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
                <div class="col">
                    <label class="text-left" for="type"> Ölçüsü </label>
                    <select id="size_id" class="form-control" name="colors[1][size_id]">
                        <option disabled="" value="">Seçin</option>
                        @foreach($sizes as $size)
                            <option value="{{$size->id}}">{{translation_first($size)->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="price">
                            Qiymət
                        </label>
                        <input id="price" type="text" class="form-control" name="colors[1][price]">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="discount">
                            Endirim
                        </label>
                        <input id="discount" type="text" class="form-control" name="colors[1][discount]">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="discount_rate">
                            Endirim faizi
                        </label>
                        <input id="discount_rate" type="text" class="form-control" name="colors[1][discount_rate]">
                    </div>
                </div>
                <div class="col">
                    <label class="text-left" for="stock"> Stok </label>
                    <select id="stock" class="form-control" name="colors[1][stock]">
                        <option value="1" selected >Stokda var</option>
                        <option value="0">Stokda yoxdur</option>
                    </select>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="code">
                            Kod
                        </label>
                        <input id="code" type="text" class="form-control" name="colors[1][code]">
                    </div>
                </div>
                <div class="col">
                    <label class="text-left" for="status_color"> Status </label>
                    <select id="status_color" class="form-control" name="colors[1][status_color]">
                        <option value="0" selected >Simple</option>
                        <option value="1">Main</option>
                    </select>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="code">
                        </label>
                        <a class="btn btn-success mt-8 delete_btn_a"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <span class="input-error error-options"></span>
        <a class="btn btn-success mt-2" id="addOptionButton" ><i class="fa fa-plus"></i></a>
    </div>
</div>
