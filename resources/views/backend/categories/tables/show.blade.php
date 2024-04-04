<div class="card-body col-md-10 offset-md-1 text-center mt-2">
    <div class="table-responsive">
        <table class="table table-hover table-rounded border gy-7 gs-7">
            <tbody>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                <td class="table-center">{{ $category->id }}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.name')</td>
                <td class="table-center">{{ translation_first($category)->name  }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.slug')</td>
                <td class="table-center">{{ translation_first($category)->slug  }}</td>
            </tr>

             @if($category->mega)
              <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                  <td class="table-row-title w-25">Mega</td>
                  <td class="table-center">{{ $category->mega == '1' ? 'Mega menyudur' : ''  }}</td>
              </tr>
              @endif

            @if(count($category->getDocuments('category_image')) > 0)
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.image')</td>
                <td class="table-center">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#imageModal_2">
                        @lang('backend.buttons.view')
                    </button>
                    @include('backend.categories.modal.image', ['model' => $category,'image_path'=>$category->getFirstImageAttribute()?: asset('backend/img/noimage.jpg')])
                </td>
            </tr>
            @endif
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.sort_order')</td>
                <td class="table-center">{{ $category->order }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.status')</td>
                <td class="table-center">{!! badge($category->status) !!}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.created_at')
                </td>
                <td class="table-center">{{ $category->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.updated_at')
                </td>
                <td class="table-center">{{ $category->updated_at->format('d-m-Y H:i:s') }}</td>
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
                <td class="table-center">{{ translation_first($category)->meta_title ?? ''  }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.keywords')
                </td>
                <td class="table-center">{{ translation_first($category)->meta_keywords ?? ''  }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.description')
                </td>
                <td class="table-center">{{ translation_first($category)->meta_description ?? ''  }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
