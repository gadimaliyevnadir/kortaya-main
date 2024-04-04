<div class="card-body col-md-10 offset-md-1 text-center mt-2">
<div class="table-responsive">
    <table class="table table-hover table-rounded border gy-7 gs-7">
            <tbody>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                <td class="table-center">{{ $product_day->id }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.title')</td>
                <td class="table-center">{{ $product_day->transtitle ?? '' }}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.product')</td>
                <td class="table-center">{{ optional($product_day->product)->name ?? "-"  }}</td>
            </tr>

            <tr>
                <td>Link</td>
                <td><a href="{{ route('backend.products.show', $product_day->product->id) }}" target="_blank" class="btn btn-sm btn-primary">Ətraflı</a></td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.price')</td>
                <td class="table-center"> {{ number_format(optional($product_day->product)->price,2)  }}<span class="azn">M</span> </td>
            </tr>

                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                   <td class="table-row-title w-25">@lang('backend.labels.discount_price')</td>
                   <td class="table-center"> {{ number_format(optional($product_day->product)->discount_price,2) ?? "-" }}<span class="azn">M</span> </td>
                </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.expired_at')</td>
                <td class="table-center"> {{ $product_day->expired_at ?? "-" }} ({{ $product_day->expired_date }})</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">@lang('backend.labels.status')</td>
                <td class="table-center">{!! badge($product_day->status) !!}</td>
            </tr>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.created_at')
                </td>
                <td class="table-center">{{ $product_day->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>

            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                <td class="table-row-title w-25">
                    @lang('backend.labels.updated_at')
                </td>
                <td class="table-center">{{ $product_day->updated_at->format('d-m-Y H:i:s') }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
