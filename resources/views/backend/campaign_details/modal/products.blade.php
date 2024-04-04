<div class="modal fade bd-example-modal-xl" id="productModal" data-backdrop="static" tabindex="-1" role="dialog"
     aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl text-center" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Günün məhulunu seçin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group"><label class="text-left" for="category_id">Kateqoriya </label>
                                <select id="category_id"
                                        class="form-control" name="category_id"
                                        data-url="{{route('backend.campaign_details.getProducts')}}"
                                >
                                    <option value="">Seçin</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ translation($category)->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="brand_id"> Brend </label>
                                <select id="brand_id" class="form-control brand_id"
                                        data-url="{{route('backend.campaign_details.getProducts')}}"
                                        name="brand_id">
                                    <option value="">Seçin</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{$brand->name}}</option>
                                    @endforeach
                                </select></div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"><label for="name"> Məhsul </label>
                                <input type="text"
                                       id="name_inp"
                                       data-url="{{route('backend.campaign_details.getProducts')}}"
                                       name="name"
                                       class="form-control name"
                                       placeholder="Məhsulun adını daxil edin">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
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
                                <tbody id="some_id">
{{--                                <tr>--}}
{{--                                    <th>96</th>--}}
{{--                                    <td><img width="25"--}}
{{--                                             src="http://127.0.0.1:8000/storage/documents/product_image/96_product-4-1.jpg"--}}
{{--                                             alt="Miss Delores Bins"></td>--}}
{{--                                    <td>Miss Delores Bins</td>--}}
{{--                                    <td>Mrs. Aryanna Walter</td>--}}
{{--                                    <td>Ike O'Conner</td>--}}
{{--                                    <td>92.13 <span class="azn"> M</span></td>--}}
{{--                                    <td>91.13 <span class="azn"> M</span></td>--}}
{{--                                    <td><a href="javascript:void(0)" class="btn btn-success btn-sm"><i--}}
{{--                                                class="fa fa-plus"></i>--}}
{{--                                            Əlavə et</a></td>--}}
{{--                                </tr>--}}
                                </tbody>
                            </table>
{{--                            <div><a href="javascript:void(0)" class="btn btn-warning">Daha çox</a></div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
