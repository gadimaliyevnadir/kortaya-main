@extends('layouts.backend.master')
@section('title', trans('backend.titles.product-days'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('/backend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/datepicker.min.css') }}">
    <style>
        .select2 {
            width:100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div id="app" class="container">
                <div class="card card-custom example example-compact">
                    @include('backend.includes.form.header', ['page' => 'product-days'])
                    <form action="{{ $edit === false ? route('backend.product-days.store') :  route('backend.product-days.update', ['product_day' => $product_day->id]) }}" method="POST">
                        @csrf
                        @if($edit)
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            @error('product_id')
                            <div class="form-group row">
                                <div class="col-md-12 mx-auto">
                                    <div class="p-1">
                                        <div class="alert alert-warning alert-danger fade show" role="alert">
                                            Günün endirimli məhsulu mütləq seçilməlidir!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="text-white" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @enderror
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12"></label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <ul class="nav nav-light-primary nav-pills" role="tablist">
                                        @foreach ($langs as $lang)
                                            <li class="nav-item">
                                                <a class="nav-link @if($loop->first) active @endif" id="tab-{{ $lang->code }}" data-toggle="tab" href="#{{ $lang->code }}">
                                                    <span class="nav-text">{{ $lang->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-content">
                                @foreach ($langs as $lang)
                                    <div class="tab-pane fade @if($loop->first) active show @endif" id="{{ $lang->code }}" role="tabpanel" aria-labelledby="tab-{{ $lang->code }}">
                                        <div class="form-group row">
                                            <label for="title:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.title') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="title:{{ $lang->code }}" type="text"
                                                           class="form-control @if($errors->has("title:$lang->code")) is-invalid @endif"
                                                           name="title:{{ $lang->code }}" value="{{ isset($product_day) ? $product_day->translate($lang->code)?->title : old('title:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.title')">
                                                    @if ($errors->has("title:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("title:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 mx-auto">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#productModal"><i class="fa fa-plus"></i> Məhsul seç </button>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ended_at"
                                       class="col-form-label text-right col-lg-3 col-sm-12 col-form-label">
                                    @lang('backend.labels.ended_at')
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-here @error('expired_at') is-invalid @enderror" id="expired_at"
                                               name="expired_at" data-timepicker="true" data-position="right bottom"
                                               value="{{ $edit ? \Illuminate\Support\Carbon::parse($product_day->expired_at)->format('d.m.Y H:i:s') : now()->addDays(1)->format('d.m.Y H:i:s') }}"
                                               maxlength="11" data-maxlength="11">
                                        @error('expired_at')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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
                                              <input type="checkbox" class="bool" name="status" value="{{ isset($product_day) ? $product_day->status : old('status') }}"  {{ (isset($product_day) ? old('status',$product_day->status) : old('status',1) ) == 1 ? 'checked' : '' }}>
                                              <span></span>
                                          </label>
                                      </span>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row"  v-if="selectedProduct?.id !== undefined ">
                                <div class="col-md-12">
                                    <h4 class="text-center">Günün məhsulu</h4>
                                    <br>
                                    <table class="table table-bordered table-hover tbale-striped table-sm text-center">
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
                                        <tr>
                                            <th>@{{ selectedProduct?.id }}</th>
                                            <td><img width="25" :src="selectedProduct?.image" :alt="selectedProduct?.name"></td>
                                            <td>@{{ selectedProduct?.name }}</td>
                                            <td>@{{ selectedProduct?.category_name }}</td>
                                            <td>@{{ selectedProduct?.brand_name }}</td>
                                            <td>@{{ selectedProduct?.price }} <span class="azn"> M</span></td>
                                            <td>@{{ selectedProduct?.discount_price }} <span class="azn"> M</span></td>
                                            <td>
                                                <a href="javascript:void(0)" @click.preventDefault="removeSelectedProduct()" class="btn btn-danger btn-sm">Sil <i class="fa fa-trash"></i></a>
{{--                                                <a :href="selectedProduct?.slug" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ətraflı</a>--}}
                                            </td>
                                            <input type="hidden" name="product_id" :value="selectedProduct.id">
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @include('backend.includes.form.footer')
                    </form>
                    @include('backend.product_days.modal.products')

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
        <script src="{{ asset('/backend/js/select2.min.js') }}"></script>
        <script src="{{ asset('/backend/js/datepicker.min.js') }}"></script>

        <script>

        $(function () {
            $.fn.datepicker.language['az'] = {
                days: ['Bazar', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                daysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                daysMin: ['Bz', 'Be', 'Ça', 'Çş', 'Ca', 'Cm', 'Şb'],
                months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                today: 'Today',
                clear: 'Clear',
                dateFormat: 'mm/dd/yyyy',
                timeFormat: 'hh:ii aa',
                firstDay: 0
            };

            let select2 = $('.select2');
            select2.select2({
                minimumResultsForSearch: 3,
                theme: 'bootstrap4',
                placeholder: 'Axtardığınız'
            });
        });
    </script>


        <script src="{{ asset('/backend/js/vue-3.js') }}"></script>

        <script>
            Vue.createApp({
                data() {
                    return {
                        form: {
                            name: '',
                            category_id: "",
                            brand_id: "",
                        },
                        products: [],
                        lastID: 0,
                        selectedProduct: {...JSON.parse('{!!  json_encode($product ?? '')  !!}')}
                    }
                },
                updated() {
                    let select2 = $('.select2');
                    select2.select2({
                        minimumResultsForSearch: 20,
                        theme: 'bootstrap4',
                        placeholder: 'Axtardığınız'
                    });
                },
                methods: {
                    getProducts() {
                        fetch('{{ route('backend.product-days.getProducts') }}?category_id=' + this.form.category_id + '&brand_id=' + this.form.brand_id + '&name=' + this.form.name)
                            .then(response => response.json())
                            .then(data => {
                                this.products = [];
                                this.products.push(...data.data);
                                this.lastID = data.lastID;
                            })
                            .catch(err => console.error(err));
                    },
                    moreLoading() {
                        if (this.lastID !== 0) {
                            fetch('{{ route('backend.product-days.getProducts') }}?category_id=' + this.form.category_id + '&brand_id=' + this.form.brand_id + '&name=' + this.form.name + '&lastID=' + this.lastID)
                                .then(response => response.json())
                                .then(data => {
                                    this.lastID = data.lastID;
                                    this.products.push(...data.data);
                                })
                                .catch(err => console.error(err));
                        }
                    },
                    addSelectedProduct(product) {
                        this.selectedProduct = {...product};
                    },
                    removeSelectedProduct() {
                        this.selectedProduct = {};
                    },
                }
            }).mount('#app')
        </script>

 @endsection
