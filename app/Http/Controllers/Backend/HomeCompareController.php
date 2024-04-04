<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormHomeCompareRequest;
use App\Http\Resources\Admin\ProductsFilterResource;
use App\Interfaces\DatatableInterface;
use App\Models\Brand;
use App\Models\Category;
use App\Models\HomeCompare;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class HomeCompareController extends Controller implements DatatableInterface
{
    public function index()
    {
        abort_if(Gate::denies('home-compare index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax())
        {
            return $this->dataTable(HomeCompare::with('products')->get());
        }

        return view('backend.home_compare.index');
    }

    public function create()
    {
        abort_if(Gate::denies('home-compare create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = false;
        $categories = Category::active()->get();
        $brands = Brand::active()->get();

        return view('backend.home_compare.form', compact('edit', 'categories', 'brands'));
    }

    public function store(FormHomeCompareRequest $request)
    {
        abort_if(Gate::denies('home-compare create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::transaction(function () use ($request) {
            $home_compare=HomeCompare::create($request->validated());
            $home_compare->products()->sync($request->products);
        });

        return redirect(route('backend.home-compares.index'))->withSuccess(trans('backend.messages.success.create'));
    }

    public function show(HomeCompare $home_compare)
    {
        abort_if(Gate::denies('home-compare show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.home_compare.show', compact('home_compare'));
    }

    public function edit(HomeCompare $home_compare)
    {
        abort_if(Gate::denies('home-compare edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        $categories = Category::active()->get();
        $brands = Brand::active()->get();
        $products =   ProductsFilterResource::collection($home_compare->products);

        return view('backend.home_compare.form', compact('home_compare', 'edit', 'categories', 'brands', 'products'));
    }

    public function update(FormHomeCompareRequest $request, HomeCompare $home_compare)
    {
        abort_if(Gate::denies('home-compare edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::transaction(function () use ($request,$home_compare) {
            $home_compare->update($request->validated());
            $home_compare->products()->sync($request->products);
        });

        return redirect(route('backend.home-compares.index'))->withSuccess(trans('backend.messages.success.update'));
    }

    public function destroy(HomeCompare $home_compare)
    {
        abort_if(Gate::denies('home-compare delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try
        {
            DB::transaction(function () use ($home_compare)
            {
                $home_compare->delete();
            });

            return response(['status' => 1]);
        }

        catch (\Exception $e)
        {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function dataTable($data)
    {
        return datatables()
            ->of($data)

            ->addColumn('compare_name_1', function($row)
            {
                return $row->products[0]->name ?? '';
            })
            ->addColumn('compare_image_1', function($row)
            {
                $src = optional($row->products[0])->getFirstMediaUrl('product_images','thumb-small') ? $row->products[0]->getFirstMediaUrl('product_images','thumb-small') : asset('backend/img/noimage.jpg');

                return '<img src="'.$src.'" alt="'.optional($row->products[0])->name.'" style="width:26px; object-fit: contain;">';
            })

            ->addColumn('compare_name_2', function($row)
            {
                return $row->products[1]->name ?? '';
            })
            ->addColumn('compare_image_2', function($row)
            {
                $src = optional($row->products[1])->getFirstMediaUrl('product_images','thumb-small') ? $row->products[1]->getFirstMediaUrl('product_images','thumb-small') : asset('backend/img/noimage.jpg');

                return '<img src="'.$src.'" alt="'.optional($row->products[1])->name.'" style="width:26px; object-fit: contain;">';
            })

            ->addColumn('status', function($row)
            {
                return badge($row->status);
            })
            ->addColumn('actions', function($row)
            {
                return $this->permissions($row->id);
            })
            ->rawColumns(['compare_name_1','compare_image_1','compare_name_2','compare_image_2','status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class  = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('home-compare show'))
        {
            $result .= "<a href='" . route('backend.home-compares.show', ['home_compare' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('home-compare edit'))
        {
            $result .= "<a href='" . route('backend.home-compares.edit', ['home_compare' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('home-compare delete'))
        {
            $result .= "<a href='" . route('backend.home-compares.destroy', ['home_compare' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }

    public function getProducts()
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
            })->where('status', '1')->orderBy('id', 'DESC')->limit(request('limit', 10))->get();

        return response()->json(['data' => ProductsFilterResource::collection($products), 'lastID' => count($products) ? $products->last()['id'] : 0], 200);
    }

}
