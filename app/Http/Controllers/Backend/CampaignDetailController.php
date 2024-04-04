<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormCampaignDetailRequest;
use App\Http\Resources\ProductsFilterResource;
use App\Models\Brand;
use App\Models\Campaign;
use App\Models\CampaignBelong;
use App\Models\CampaignDetail;
use App\Models\CampaignType;
use App\Models\Category;
use App\Models\Product;
use App\Services\CampaignService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CampaignDetailController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('campaign_details create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (request()->ajax()) {
            return $this->dataTable(CampaignDetail::latest()->get());
        }

        return view('backend.campaign_details.index');
    }

    public function create()
    {
        abort_if(Gate::denies('campaign_details create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = false;
        $campaigns = Campaign::active()->get();
        $campaign_types = CampaignType::active()->get();
        $campaign_belongs = CampaignBelong::get();
        $categories = Category::active()->whereNull('parent_id')->get();
        $brands = Brand::active()->get();

        return view('backend.campaign_details.form',
            compact('edit', 'campaigns','campaign_types', 'categories',
             'brands','campaign_belongs',
        ));
    }

    public function store(FormCampaignDetailRequest $request)
    {
        abort_if(Gate::denies('campaign_details create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();
        try {
                $data = $request->validated();
                $campaign_detail = CampaignDetail::create([
                    'campaign_id' => $data['campaign_id'],
                    'campaign_type_id' =>$data['campaign_type_id'],
                    'campaign_belong_id' => $data['campaign_belong_id'],
                    'started_at' => Carbon::parse($data['started_at'])->format("Y-m-d H:i:s"),
                    'ended_at' => Carbon::parse($data['ended_at'])->format("Y-m-d H:i:s"),
                    'campaign_discount_price' => $data['campaign_discount_price'],
                    'campaign_discount_percent' => $data['campaign_discount_percent'],
                ]);
                if($request->filled('products'))
                    $campaign_detail->products()->sync($request->products);

            DB::commit();
            return redirect()->route('backend.campaign_details.index')->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('backend')->error($e->getMessage());
            dd($e->getMessage());
            return redirect(route('backend.campaign_details.index'))->withError(trans('backend.messages.error.update'));
        }

    }

    public function show(CampaignDetail $campaign_detail)
    {
        abort_if(Gate::denies('campaign_details show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.campaign_details.show', compact('campaign_detail'));
    }

    public function edit(CampaignDetail $campaign_detail)
    {
        abort_if(Gate::denies('campaign_details edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        $campaigns = Campaign::active()->get();
        $campaign_types = CampaignType::active()->get();
        $campaign_belongs = CampaignBelong::get();
        $categories = Category::active()->whereNull('parent_id')->get();
        $brands = Brand::active()->get();
        $campaign_detail->load('products');

        return view('backend.campaign_details.form', compact('edit', 'campaigns','campaign_types',
            'categories', 'brands','campaign_detail','campaign_belongs'));
    }

    public function update(FormCampaignDetailRequest $request, CampaignDetail $campaign_detail)
    {
        abort_if(Gate::denies('campaign_details edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();
        try {
                $data = $request->validated();
                $campaign_detail->update([
                    'campaign_id' => $data['campaign_id'],
                    'campaign_type_id' =>$data['campaign_type_id'],
                    'campaign_belong_id' => $data['campaign_belong_id'],
                    'started_at' => Carbon::parse($data['started_at'])->format("Y-m-d H:i:s"),
                    'ended_at' => Carbon::parse($data['ended_at'])->format("Y-m-d H:i:s"),
                    'campaign_discount_price' => $data['campaign_discount_price'],
                    'campaign_discount_percent' => $data['campaign_discount_percent'],
                ]);
                if($request->filled('products')) {
                    $campaign_detail->products()->sync($request->products);
                }
                else {
                    $campaign_detail->products()->detach();
                }
            DB::commit();
            return redirect()->route('backend.campaign_details.index')->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('backend')->error($e->getMessage());
            dd($e->getMessage());
            return redirect(route('backend.campaign_details.index'))->withError(trans('backend.messages.error.update'));
        }
    }

    public function destroy(CampaignDetail $campaign_detail)
    {
        abort_if(Gate::denies('campaign_details delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $campaign_detail->delete();
            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }


    public function dataTable($data)
    {
        return datatables()
            ->of($data)
            ->addColumn('campaign_name', function ($row) {
                return translation_first($row->campaign)->name ?? '';
            })
            ->addColumn('started_at', function ($row) {
                return $row['started_at'];
            })
            ->addColumn('ended_at', function ($row) {
                return $row['ended_at'];
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('campaign_details show')) {
            $result .= "<a href='" . route('backend.campaign_details.show', ['campaign_detail' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('campaign_details edit')) {
            $result .= "<a href='" . route('backend.campaign_details.edit', ['campaign_detail' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('campaign_details delete')) {
            $result .= "<a href='" . route('backend.campaign_details.destroy', ['campaign_detail' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }

    public function getProducts(Request $request)
    {

        $products = Product::with(['category', 'brand'])
            ->when(request('category_id'), function ($query) {
                return $query->where('category_id', request('category_id'));
            })
            ->when(request('brand_id'), function ($query) {
                return $query->where('brand_id', request('brand_id'));
            })
            ->when(request('name'), function ($query) {
                return $query->where('name', 'LIKE', '%' . request('name') . '%');
            })
            ->when(request('lastID'), function ($query) {
                return $query->where('id', '<', request('lastID'));
            })
            ->where('status', '1')->orderBy('id', 'DESC')->limit(request('limit', 40))->get();

        return response()->json(['data' => ProductsFilterResource::collection($products), 'lastID' => count($products) ? $products->last()['id'] : 0], 200);

    }
}
