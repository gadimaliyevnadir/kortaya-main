<div class="card-body col-md-10 offset-md-1 text-center mt-2">
    <div class="table-responsive">
        <table class="table table-hover table-rounded border gy-7 gs-7">
            <tbody>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                <td class="table-center">{{ $campaign->id }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.name')
                </td>
                <td class="table-center">{{ translation_first($campaign)->name }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.slug')</td>
                <td class="table-center">{{ translation_first($campaign)->slug }}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.content')</td>
                <td class="table-center">{!! translation_first($campaign)->text!!}</td>
            </tr>


            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.status')</td>
                <td class="table-center">{!! badge($campaign->status) !!}</td>
            </tr>


            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.created_at')
                </td>
                <td class="table-center">{{ $campaign->created_at->format('d-m-Y H:i:s') }}</td>
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
                <td class="table-center">{{ translation_first($campaign)->title ?? ''  }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.keywords')
                </td>
                <td class="table-center">{{ translation_first($campaign)->keywords ?? ''  }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.description')
                </td>
                <td class="table-center">{{ translation_first($campaign)->description ?? ''  }}</td>
            </tr>


            </tbody>
        </table>
    </div>
        @include('backend.includes.media',[
         'model' => $campaign,
         'name'  => 'campaigns',
         'media_collection_name'  => 'campaign_image',
         'isDeleted' => false,
         'isCovered' => false,
        ])
</div>
