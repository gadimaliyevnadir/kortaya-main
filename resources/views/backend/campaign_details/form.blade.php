@extends('layouts.backend.master')
@section('title', trans('backend.titles.campaign_details'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('/backend/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/select2-bootstrap4.min.css') }}">
    <style>
        .select2 {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div id="app" class="container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card card-custom example example-compact">
                    @include('backend.includes.form.header', ['page' => 'campaign_details'])
                    <form
                        action="{{ $edit === false ? route('backend.campaign_details.store') : route('backend.campaign_details.update', ['campaign_detail' => $campaign_detail->id])  }}"
                        method="POST">
                        @csrf
                        @if($edit)
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="campaign_id"
                                       class="col-form-label text-right col-lg-3 col-sm-12 col-form-label">
                                    Uyğun kampanyanı seçin
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <select name="campaign_id" class="select2 form-control" id="campaign_id">
                                        @foreach($campaigns as $campaign)
                                            <option
                                                value="{{ $campaign->id }}" {{ isset($campaign_detail) && $campaign_detail->campaign_id == $campaign->id ? 'selected' : '' }}
                                                {{ old('campaign_id') == $campaign->id   ? 'selected' : '' }}
                                            >{{ translation_first($campaign)->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has("campaign_id"))
                                        <div class="invalid-feedback">{{ $errors->first("started_at") }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="campaign_type_id"
                                       class="col-form-label text-right col-lg-3 col-sm-12 col-form-label">
                                    Kampaniya tipini seçin
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <select class="form-control" id="campaign_type_id" name="campaign_type_id">
                                        {{--                                        <option selected value="">Seçin</option>--}}
                                        @foreach($campaign_types as $type)
                                            <option
                                                {{ isset($campaign_detail) && $campaign_detail->campaign_type_id == $type->id ? 'selected' : '' }}
                                                value="{{ $type->id }}"> {{ translation_first($type)->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has("campaign_type_id"))
                                        <div class="invalid-feedback">{{ $errors->first("started_at") }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="campaign_belong_id"
                                       class="col-form-label text-right col-lg-3 col-sm-12 col-form-label">
                                    Kompaniyaya aiddir
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <select class="form-control" id="campaign_belong_id" name="campaign_belong_id">
                                        {{--                                        <option selected value="">Seçin</option>--}}
                                        @foreach($campaign_belongs as $campaign_belong)
                                            <option
                                                {{ isset($campaign_detail) && $campaign_detail->campaign_belong_id == $campaign_belong->id ? 'selected' : '' }}
                                                value="{{ $campaign_belong->id }}"> {{ translation_first($campaign_belong)->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has("campaign_belong_id"))
                                        <div class="invalid-feedback">{{ $errors->first("campaign_belong_id") }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="started_at"
                                       class="col-form-label text-right col-lg-3 col-sm-12 col-form-label">
                                    @lang('backend.labels.started_at')
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker-here" id="started_at"
                                               name="started_at" data-timepicker="true" data-position="right bottom"
                                               value="{{ $edit ? \Illuminate\Support\Carbon::parse($campaign_detail['started_at'])->format('d.m.Y H:i:s') : now()->format('d.m.Y H:i:s') }}"
                                               maxlength="11" data-maxlength="11">
                                        @if ($errors->has("started_at"))
                                            <div class="invalid-feedback">{{ $errors->first("started_at") }}</div>
                                        @endif
                                    </div>
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
                                        <input type="text" class="form-control datepicker-here" id="ended_at"
                                               name="ended_at" data-timepicker="true" data-position="right bottom"
                                               value="{{ $edit ? \Illuminate\Support\Carbon::parse($campaign_detail['ended_at'])->format('d.m.Y H:i:s') : now()->addDays(1)->format('d.m.Y H:i:s') }}"
                                               maxlength="11" data-maxlength="11">
                                        @if ($errors->has("ended_at"))
                                            <div class="invalid-feedback">{{ $errors->first("ended_at") }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="campaign_discount_price"
                                       class="col-form-label text-right col-lg-3 col-sm-12">
                                    Discount price
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input id="campaign_discount_price" type="number" class="form-control
                                        @if($errors->has("campaign_discount_price")) is-invalid @endif"
                                               name="campaign_discount_price"
                                               value="{{ isset($campaign_detail) ? $campaign_detail->campaign_discount_price : old('campaign_discount_price') }}">
                                        @if ($errors->has("campaign_discount_price"))
                                            <div
                                                class="invalid-feedback">{{ $errors->first("campaign_discount_price") }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="campaign_discount_percent"
                                       class="col-form-label text-right col-lg-3 col-sm-12">
                                    Discount percent
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input id="campaign_discount_percent" type="number" class="form-control
                                        @if($errors->has("campaign_discount_percent")) is-invalid @endif"
                                               name="campaign_discount_percent"
                                               value="{{ isset($campaign_detail) ? $campaign_detail->campaign_discount_percent : old('campaign_discount_percent') }}">
                                        @if ($errors->has("campaign_discount_percent"))
                                            <div
                                                class="invalid-feedback">{{ $errors->first("campaign_discount_percent") }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 mx-auto">
                                    <button class="btn btn-primary" type="button" data-toggle="modal"
                                            data-target="#productModal"><i class="fa fa-plus"></i> Məhsul seç
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12"><h4 class="text-center">Məhsullar</h4><br>
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
                                        <tbody id="exists_products">
                                        @if(isset($campaign_detail))
                                            @foreach($campaign_detail->products as $campaign_product)
                                                <tr class="delete_pr_button_parent">
                                                    <th>{{$campaign_product->id}}</th>
                                                    <td><img width="25"
                                                             src="{{$campaign_product->first_image}}"
                                                             alt="Zoe Schaefer"></td>
                                                    <td>{{$campaign_product->name}}</td>
                                                    <td>{{translation_first($campaign_product->category)->name}}</td>
                                                    <td>{{$campaign_product->brand->name}}</td>
                                                    <td>{{$campaign_product->price}} <span class="azn"> M</span></td>
                                                    <td>{{$campaign_product->discount_price}} <span class="azn"> M</span></td>
                                                    <td><a href="javascript:void(0)"
                                                           class="btn btn-danger btn-sm delete_pr_button">Sil <i
                                                                class="fa fa-trash"></i></a>
                                                    </td>
                                                    <input type="hidden" name="products[{{$campaign_product->id}}]" value="{{$campaign_product->id}}">
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        @include('backend.includes.form.footer')
                    </form>
                    @include('backend.campaign_details.modal.products')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('/backend/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('main/campaign.js') }}"></script>
    <script>
        $(document).ready(function () {
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
                minimumResultsForSearch: 20,
                theme: 'bootstrap4',
                placeholder: 'Axtardığınız'
            });
        });
    </script>
@endsection
