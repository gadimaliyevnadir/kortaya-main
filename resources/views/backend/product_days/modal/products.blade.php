<div class="modal fade bd-example-modal-xl" id="productModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl text-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Günün məhulunu seçin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-left" for="category_id">
                                    @lang('backend.labels.category')
                                </label>
                                <select id="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror"
                                        name="category_id" v-model="form.category_id" @change="getProducts">
                                    <option selected value="" disabled>Seçin</option>
                                    <option value="">Hamısı</option>
                                @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{translation_first($category)->name }}
                                        </option>
                                        @empty
                                    @endforelse
                                </select>
                                @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="brand_id">
                                    @lang('backend.labels.brand')
                                </label>
                                <select id="brand_id"
                                        class="form-control @error('brand_id') is-invalid @enderror"
                                        name="brand_id" v-model="form.brand_id" @change="getProducts">
                                    <option selected value="" disabled>Seçin</option>
                                    <option value="">Hamısı</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="brand_id">
                                    @lang('backend.labels.product')
                                </label>
                                <input v-model="form.name" @input.lazy="getProducts" type="text" class="form-control"
                                       placeholder="Məhsulun adını daxil edin">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12" v-if="products.length > 0">
                            <table class="table table-bordered table-hover table-striped table-sm text-center">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Şəkil</th>
                                    <th scope="col">Adı</th>
                                    <th scope="col">Kateqoriyası</th>
                                    <th scope="col">Brendi</th>
                                    <th scope="col">Qiyməti</th>
                                    <th scope="col">Endirimli qiyməti</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(product, index) in products" @key="product.id">
                                    <th>@{{ product?.id }}</th>
                                    <td><img width="25" :src="product.image" :alt="product.name"></td>
                                    <td>@{{ product?.name }}</td>
                                    <td>@{{ product?.category_name }}</td>
                                    <td>@{{ product?.brand_name }}</td>
                                    <td>@{{ product?.price }} <span class="azn"> M</span></td>
                                    <td>@{{ product?.discount_price }} <span v-if="product.discount_price" class="azn"> M</span></td>
                                    <td>
                                        <a v-if="product.id !== selectedProduct.id" href="javascript:void(0)"
                                           @click.preventDefault="addSelectedProduct(product)"
                                           class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Əlavə et</a>
                                        <a v-else href="javascript:void(0)" class="btn btn-warning btn-sm"
                                        ><i class="fa fa-check"></i> Əlavə olundu</a>
{{--                                        <a :href="product.slug" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ətraflı</a>--}}

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div>
                                <a href="javascript:void(0)" @click.preventDefault="moreLoading" class="btn btn-warning">Daha çox</a>
                            </div>
                        </div>


                </div>
                </div>
            </div>
        </div>
    </div>
</div>
