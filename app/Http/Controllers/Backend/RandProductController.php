<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormRandProductRequest;
use App\Http\Resources\Admin\ProductsFilterResource;
use App\Interfaces\DatatableInterface;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\RandProduct;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RandProductController extends Controller implements DatatableInterface
{
    public function index()
    {
        abort_if(Gate::denies('rand-products index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            return $this->dataTable(RandProduct::all());
        }

        return view('backend.rand_products.index');
    }

    public function create()
    {
        abort_if(Gate::denies('rand-products create'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $edit = false;
        $categories = Category::active()->get();
        $brands = Brand::active()->get();

        return view('backend.rand_products.form', compact('edit', 'categories', 'brands'));
    }

    public function store(FormRandProductRequest $request)
    {
        abort_if(Gate::denies('rand-products create'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        RandProduct::create($request->validated());

        return redirect(route('backend.rand-products.index'))->withSuccess(trans('backend.messages.success.create'));

    }

    public function show(RandProduct $rand_product)
    {
        abort_if(Gate::denies('rand-products show'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        return view('backend.rand_products.show', compact('rand_product'));
    }

    public function edit(RandProduct $rand_product)
    {
        abort_if(Gate::denies('rand-products edit'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $edit=true;
        $categories = Category::active()->get();
        $brands = Brand::active()->get();
        $product = new ProductsFilterResource($rand_product->product);

        return view('backend.rand_products.form', compact('edit', 'rand_product', 'categories', 'brands', 'product'));
    }

    public function update(FormRandProductRequest $request, RandProduct $rand_product)
    {
        abort_if(Gate::denies('rand-products edit'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $rand_product->update($request->validated());

        return redirect(route('backend.rand-products.index'))->withSuccess(trans('backend.messages.success.update'));

    }

    public function destroy(RandProduct $rand_product)
    {
        abort_if(Gate::denies('rand-products delete'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        try
        {
            $rand_product->delete();

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
            ->addColumn('title', function ($row) {
                return $row->transtitle ?? '';
            })
            ->addColumn('name', function ($row) {
                return $row->product->name ?? '';
            })
            ->addColumn('image', function($row)
            {
                if (isset($row->product)) {
                    $src = $row->product->getFirstMediaUrl('product_images','thumb-small') ?: asset('backend/img/noimage.jpg');
                }
                return '<img src="'.$src.'" alt="'.$row->product->name.'" style="width:26px; object-fit: contain;">';
            })
            ->addColumn('price', function ($row) {
                return $row->product->price.' <span class="azn">M</span>';
            })
            ->addColumn('discount_price', function ($row) {
                if(!empty($row->product->discount_price)){
                    return $row->product->discount_price.' <span class="azn">M</span>';
                }
            })

            ->addColumn('status', function($row)
            {
                return badge($row->status);
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['image','price','discount_price','status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('rand-products show')) {
            $result .= "<a href='" . route('backend.rand-products.show', ['rand_product' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('rand-products edit')) {
            $result .= "<a href='" . route('backend.rand-products.edit', ['rand_product' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('rand-products delete')) {
            $result .= "<a href='" . route('backend.rand-products.destroy', ['rand_product' => $id]) . "'";
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
            })->where('status', '1')->orderBy('id', 'DESC')->limit(request('limit', 12))->get();

            return response()->json(['data' => ProductsFilterResource::collection($products), 'lastID' => count($products) ? $products->last()['id'] : 0], 200);
    }

}
