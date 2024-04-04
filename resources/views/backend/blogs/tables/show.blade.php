<div class="card-body col-md-10 offset-md-1 text-center mt-2">
<div class="table-responsive">
        <table class="table table-hover table-rounded border gy-7 gs-7">
            <tbody>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                    <td class="table-center">{{ $blog->id }}</td>
                </tr>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">@lang('backend.labels.name')</td>
                    <td class="table-center">{{ $blog->name }}</td>
                </tr>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">@lang('backend.labels.content')</td>
                    <td class="table-center">{{ strip_tags(translation_first($blog)->content) ?? ''  }}</td>
                </tr>

                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">@lang('backend.labels.image')</td>
                    <td class="table-center">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#imageModal">
                            @lang('backend.buttons.view')
                        </button>
                        @include('backend.includes.modal.image',['model' => $blog,'image_path'=>$blog->getFirstImageAttribute()?: asset('backend/img/noimage.jpg')])
                    </td>
                </tr>


                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">@lang('backend.labels.status')</td>
                    <td class="table-center">{!! badge($blog->status) !!}</td>
                </tr>

                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.created_at')
                    </td>
                    <td class="table-center">{{ $blog->created_at->format('d-m-Y H:i:s') }}</td>
                </tr>

                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.updated_at')
                    </td>
                    <td class="table-center">{{ $blog->updated_at->format('d-m-Y H:i:s') }}</td>
                </tr>


            </tbody>
        </table>
    <h1 class="mt-2 text-center">SEO</h1>
    <table class="table table-hover table-rounded border gy-7 gs-7">
        <tbody>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
            <td class="table-row-title w-25">
                @lang('backend.labels.title')
            </td>
            <td class="table-center">{{ translation_first($blog)->meta_title ?? ''  }}</td>
        </tr>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
            <td class="table-row-title w-25">
                @lang('backend.labels.keywords')
            </td>
            <td class="table-center">{{ translation_first($blog)->meta_keywords ?? ''  }}</td>
        </tr>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
            <td class="table-row-title w-25">
                @lang('backend.labels.description')
            </td>
            <td class="table-center">{{ translation_first($blog)->meta_description ?? ''  }}</td>
        </tr>
        </tbody>
    </table>
    </div>
</div>
