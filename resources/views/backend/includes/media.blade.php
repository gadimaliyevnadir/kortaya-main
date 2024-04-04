@if(count($model->getDocuments($media_collection_name)) > 0)
    @push('extrahead')
        <link rel="stylesheet" href="{{ asset('/backend/css/lightcase.min.css') }}">
        <style>
            .media_custom {
                display: block;
                text-align: center;
                position: relative;
                padding: 20px;
                background: #fff;
                border: 1px solid #e7e5ea;
                box-sizing: border-box;
                border-radius: 12px;
                margin-bottom: 30px;
            }

            .media_custom:hover {
                border-color: #3e4095;
                background-color: #e7e5ea;
                cursor: pointer;
            }

            .media_text {
                font-style: normal;
                color: #262626;
                height: 40px;
                overflow: hidden;
                font-size: 12px;
            }

            .date {
                font-style: normal;
                font-weight: 400;
                font-size: 12px;
                line-height: 28px;
                color: #808191;
                letter-spacing: -.36px;
                display: block;
            }
        </style>
    @endpush
    <div class="row">
        <h2 class="text-center w-100 mb-10">
            @if(strpos($media_collection_name, 'video_image') !== false)
                Video şəkili
            @elseif(strpos($media_collection_name, 'file') !== false)
                Fayl
            @elseif(strpos($media_collection_name, 'logo') !== false)
                Logo
            @elseif(strpos($media_collection_name, 'video') !== false)
                Video
            @elseif(strpos($media_collection_name, 'icons') !== false)
                İkon
            @else
                @lang('backend.labels.images')
            @endif
        </h2>
        @foreach($model->getDocuments($media_collection_name) as $image)
            <div class="mr-3">
                <div class="media media_custom">
                    @if(strpos($media_collection_name, 'video_image') !== false)
                        <a class="gal-item showcase" data-rel="lightcase:myCollection:slideshow"
                           title="" href="{{ $image->document }}">
                            <figure>
                                <img style="width:100px; height:50px" class="img-fluid" alt=""
                                     src="{{ $image->document }}">
                            </figure>
                        </a>
                    @elseif(strpos($media_collection_name, 'file') !== false)
                        <iframe class="border border-primary"
                                src="{{$image->document }}"
                                width="500"
                                height="500">
                        </iframe>
                    @elseif(strpos($media_collection_name, 'video') !== false)
                        <video width="400" controls>
                            <source src="{{ $image->document }}">
                            Brouzeriniz video tipini dəstəkləmir.
                        </video>
                    @else
                        <a class="gal-item showcase" data-rel="lightcase:myCollection:slideshow"
                           title="" href="{{ $image->document }}">
                            <figure>
                                <img style="width:150px; height:100px" class="img-fluid" alt=""
                                     src="{{ $image->document }}">
                            </figure>
                        </a>
                    @endif

                    <div class="media-body mt-2">
                        @if($image->status == 'main')
                            <button type="button" disabled data-id="{{ $image->id }}"
                                    class="btn btn-bg-danger btn-block mb-1 domain">
                                əsas şəkil
                            </button>
                        @else
                            @if(isset($isMain) && $isMain)
                                <button type="button" data-id="{{ $image->id }}"
                                        class="btn btn-primary btn-block mb-1 domain">
                                    əsas təyin edin
                                </button>
                            @endif
                        @endif
                        @if(isset($orderSecondImage) && $orderSecondImage)
                            @if($image->order == 'second')
                                <button type="button" disabled data-id="{{ $image->id }}"
                                        class="btn btn-bg-danger btn-block mb-1 dosecond">
                                    ikinci şəkil
                                </button>
                            @else
                                <button type="button" data-id="{{ $image->id }}"
                                        class="btn btn-primary btn-block mb-1 dosecond">
                                    ikinci təyin edin
                                </button>
                            @endif
                        @endif
                        @if(isset($isDeleted) && $isDeleted)
                            <button type="button" data-id="{{ $image->id }}"
                                    class="btn btn-primary btn-block mb-1 dodelete">
                                Sil
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @push('extrascripts')
        <script src="{{ asset('/backend/js/lightcase.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                let showcase = $('a.showcase'),
                    dodelete = $('.dodelete'),
                    docover = $('.docover');
                domain = $('.domain');
                secondImage = $('.dosecond');

                showcase.lightcase({
                    transition: 'scrollHorizontal',
                    showSequenceInfo: false,
                    showTitle: false
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                docover.click(function (e) {
                    e.preventDefault();
                    Swal.fire(
                        {
                            title: 'Şəkili örtük şəkili etmək istədiyinizə əminsiniz?',
                            text: 'Bu şəkili örtük şəkili etmək istədiyinizə əminsiniz?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Bəli',
                            cancelButtonText: '{{ trans('backend.buttons.cancel') }}'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            let id = $(this).data('id');
                            $.ajax({
                                type: 'patch',
                                url: '/admin/{{ $name }}/' + id + '/coverimg',
                                data: {'id': id},
                                dataType: 'json',
                                success: function (result) {
                                    if (result.status != 1) {
                                        {!! notify('error', trans('backend.messages.error.cover')) !!}
                                    } else {
                                        {!! notify('success', trans('backend.messages.success.cover')) !!}
                                    }
                                    location.reload();

                                },
                            });
                        }
                    });


                });

                dodelete.click(function (e) {
                    e.preventDefault();

                    {!! confirm() !!}.then((result) => {
                        if (result.isConfirmed) {
                            let id = $(this).data('id');
                            $.ajax({
                                type: 'post',
                                url: '/admin/documents/' + id + '/delete',
                                data: {'id': id},
                                dataType: 'json',
                                success: function (result) {
                                    if (result.status != 1) {
                                        {!! notify('error', trans('backend.messages.error.delete')) !!}
                                    } else {
                                        {!! notify('success', trans('backend.messages.success.delete')) !!}
                                        $('#' + id).remove();
                                    }

                                    location.reload();

                                }
                            });
                        }
                    });
                });

                domain.click(function (e) {
                    e.preventDefault();

                    {!! confirm_update() !!}.then((result) => {
                        if (result.isConfirmed) {
                            let id = $(this).data('id');
                            $.ajax({
                                type: 'post',
                                url: '/admin/documents/' + id + '/set-main',
                                data: {'id': id,},
                                dataType: 'json',
                                success: function (result) {
                                    if (result.status != 1) {
                                        {!! notify('error', trans('backend.messages.error.update')) !!}
                                    } else {
                                        {!! notify('success', trans('backend.messages.success.update')) !!}
                                        $('#' + id).remove();
                                    }

                                    location.reload();

                                }
                            });
                        }
                    });
                });
                secondImage.click(function (e) {
                    e.preventDefault();

                    {!! confirm_update() !!}.then((result) => {
                        if (result.isConfirmed) {
                            let id = $(this).data('id');
                            $.ajax({
                                type: 'post',
                                url: '/admin/documents/' + id + '/set-order',
                                data: {'id': id,},
                                dataType: 'json',
                                success: function (result) {
                                    if (result.status != 1) {
                                        {!! notify('error', trans('backend.messages.error.update')) !!}
                                    } else {
                                        {!! notify('success', trans('backend.messages.success.update')) !!}
                                        $('#' + id).remove();
                                    }

                                    location.reload();

                                }
                            });
                        }
                    });
                });

            });
        </script>
    @endpush
@endif
