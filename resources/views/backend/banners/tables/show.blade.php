<div class="card-body col-md-10 offset-md-1 text-center mt-2">
    <div class="table-responsive">
        <table class="table table-hover table-rounded border gy-7 gs-7">
            <tbody>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                <td class="table-center">{{ $banner->id }}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.link')</td>
                <td class="table-center">{{ $banner->link }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.status')</td>
                <td class="table-center">{!! badge($banner->status) !!}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.name')</td>
                <td class="table-center">{{{$banner->translation->name}}}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.banner_type')</td>
                <td class="table-center">{{ $banner->banner_type }}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.content')</td>
                <td class="table-center">{{{$banner->translation->text}}}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.created_at')
                </td>
                <td class="table-center">{{ $banner->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.updated_at')
                </td>
                <td class="table-center">{{ $banner->updated_at->format('d-m-Y H:i:s') }}</td>
            </tr>

            </tbody>
        </table>
    </div>
    @include('backend.includes.media',[
                        'model' => $banner,
                        'name'  => 'banner',
                        'media_collection_name'  => 'banner_image',
                        'isDeleted' => false,
                        'isCovered' => false,
                    ])
</div>
