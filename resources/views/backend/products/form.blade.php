@extends('layouts.backend.master')
@section('title', trans('backend.titles.products'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('/backend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/select2-bootstrap4.min.css') }}">
    <style>
        .select2 {
            width:100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
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
                    @include('backend.includes.form.header',['page' =>  $edit === false ? 'products' : $product->name ,'edit' => true])
                    <form action="{{ $edit === false ?  route('backend.products.store') : route('backend.products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($edit)
                            @method('PUT')
                        @endif
                        <div class="card-body" id="productApp">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <ul class="nav nav-light-danger nav-pills" role="tablist">
                                        @foreach ($tabs as $tab)
                                            <li class="nav-item">
                                                <a class="nav-link @if($loop->first) active @endif" href="#{{ $tab }}" id="tab-{{ $tab }}" data-toggle="tab">
                                                    <span class="nav-text">@lang("backend.tabs.$tab")</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <hr class="mb-4 pb-4">
                            <div class="tab-content">
                                @foreach ($tabs as $tab)
                                    @include("backend.products.tabs.form.$tab")
                                @endforeach
                            </div>
                        </div>
                        @include('backend.includes.form.footer')
                    </form>
                </div>
                <div class="card">
                    <div class="card-body">
                        @if ($edit)
                            @include('backend.includes.media',[
                            'model' => $product,
                            'name'  => 'product',
                            'media_collection_name'  => 'product_image',
                            'isDeleted' => true,
                            'isMain' => true,
                            'orderSecondImage' => true,
                            'isCovered' => false,
                        ])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/backend/js/select2.min.js') }}"></script>
    <script src="{{asset('main/backend/colors.js')}}"></script>
    <script>
        let key_az = document.querySelector('.tagify-az');
        let key_en = document.querySelector('.tagify-en');
        let key_ru = document.querySelector('.tagify-ru');

        new Tagify(key_az);
        new Tagify(key_en);
        new Tagify(key_ru);

        $(document).ready(function() {

            let select2 = $('.select2'),
                summernote = $('.summernote');

            select2.select2({
                theme: 'bootstrap4',
                minimumResultsForSearch: 20,
                placeholder: 'Axtardığınız'
            });

            summernote.summernote({
                height:300,
                imageAttributes: {
                    icon: '<i class="note-icon-pencil"/>',
                    figureClass: 'figureClass',
                    figcaptionClass: 'captionClass',
                    captionText: 'Caption Goes Here.',
                    manageAspectRatio: true
                },
                lang: 'en-US',
                popover: {
                    image: [
                        ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']],
                        ['custom', ['imageAttributes']],
                    ],
                },
            });

        });
    </script>
@endsection
