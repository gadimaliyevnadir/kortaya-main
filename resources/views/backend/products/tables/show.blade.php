<div class="card-body col-md-10 offset-md-1 text-center mt-2">
    <div class="table-responsive">
        <table class="table table-hover table-rounded border gy-7 gs-7">
            <tbody>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                <td class="table-center">{{ $product->id }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.name')
                </td>
                <td class="table-center">{{ $product->name }}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.slug')
                </td>
                <td class="table-center">{{ $product->slug }}</td>
            </tr>


            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.category')
                </td>
                <td class="table-center">{{ translation_first($product->category)->name ?? '' }}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.brand')
                </td>
                <td class="table-center">{{ $product->brand->name ?? '' }}</td>
            </tr>


            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.quantity_type')
                </td>
                <td class="table-center">
                    @switch($product->quantity_type)
                        @case(1)
                            @lang('backend.quantity_types.in_stock')
                            @break
                        @case(2)
                            @lang('backend.quantity_types.not_in_stock')
                            @break
                        @case(3)
                            @lang('backend.quantity_types.count')
                            @break
                    @endswitch
                </td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.quantity')
                </td>
                <td class="table-center">
                    {{ $product->quantity_type == 3 ? $product->quantity : '---' }}
                </td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.weight')
                </td>
                <td class="table-center">{{ $product->weight }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.length')
                </td>
                <td class="table-center">{{ $product->length }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.height')
                </td>
                <td class="table-center">{{ $product->height }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.maximum_quantity')
                </td>
                <td class="table-center">{{ $product->maximum_quantity }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.width')
                </td>
                <td class="table-center">{{ $product->width }}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    Outlet
                </td>
                <td class="table-center">{{ $product->outlet ? 'Outlet məhsuldur' : 'Outlet məhsul deyil' }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.status')
                </td>
                <td class="table-center">{!! badge($product->status) !!}</td>
            </tr>

            <tr class="bg-gray-100">
                <td class="table-row-title w-25">
                    @lang('backend.labels.created_at')
                </td>
                <td class="table-center">{{ $product->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>

            <tr class="bg-gray-100">
                <td class="table-row-title w-25">
                    @lang('backend.labels.updated_at')
                </td>
                <td class="table-center">{{ $product->updated_at->format('d-m-Y H:i:s') }}</td>
            </tr>
            </tbody>
        </table>


        @if(count($product->colors) > 0)
            <h2 class="mt-2 text-center">{{ __('backend.labels.colors') }}</h2>
            <table class="table table-hover table-rounded border gy-7 gs-7">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>@lang('backend.labels.color')</td>
                    <td>@lang('backend.labels.price')</td>
                    <td>@lang('backend.labels.stock')</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($product->colors as $color)
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                        <td class="table-center">{{ $color->id }}</td>
                        <td class="table-center">{{ translation_first($color)->name }}
                            <span class="badge"
                                  style="border: 1px solid #000; background-color:{{ $color->color_code }}; width:10px;"> </span>
                        </td>
                        <td>{{ number_format($color->pivot->price,2) }} <span class="azn">M</span></td>
                        <td class="table-center">{{ $color->pivot->stock }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif


        @if(count($product->badges) > 0)
            <h2 class="mt-2 text-center">{{ __('backend.labels.badges') }}</h2>
            <table class="table table-hover table-rounded border gy-7 gs-7">
                <tbody>
                @foreach ($product->badges as $badge)
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                        <td class="table-row-title w-25">
                            @lang('backend.labels.name')
                        </td>
                        <td class="table-center">{{ translation_first($badge)->name  }} </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        @if(count($product->productStatuses) > 0)
            <h2 class="mt-2 text-center">{{ __('backend.titles.product-statuses') }}</h2>
            <table class="table table-hover table-rounded border gy-7 gs-7">
                <tbody>

                @foreach ($product->productStatuses as $status)
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                        <td class="table-row-title w-25">
                            @lang('backend.labels.product_status')
                        </td>
                        <td class="table-center">
                            <span class="badge badge-primary mb-2">{{ translation_first($status)->name }}</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif


        <h2 class="mt-2 text-center">SEO</h2>
        <table class="table table-hover table-rounded border gy-7 gs-7">
            <tbody>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.title')
                </td>
                <td class="table-center">{{ translation_first($product)->meta_title ?? ''  }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.keywords')
                </td>
                <td class="table-center">{{ translation_first($product)->meta_keywords ?? ''  }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.description')
                </td>
                <td class="table-center">{{ translation_first($product)->meta_description ?? ''  }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card-body">
    @include('backend.includes.media',[
    'model' => $product,
    'name'  => 'product',
    'media_collection_name'  => 'product_image',
    'isDeleted' => false,
    'isCovered' => false,
])
</div>
