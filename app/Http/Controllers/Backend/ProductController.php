<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormProductRequest;
use App\Models\Badge;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\OptionGroup;
use App\Models\Product;
use App\Models\ProductStatus;
use App\Models\Size;
use App\Models\Type;
use App\Services\ProductService;
use App\Services\UploadDocumentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('products index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $products = Product::query()->filterBy($request->all());
        if (request()->ajax()) {
            $limit = is_null($request['length']) ? 50 : $request['length'];
            $start = is_null($request['start']) ? 50 : $request['start'];
            $data = $products->latest()->offset($start)->limit($limit)->get();
            $total_filtered = Product::count();
            return $this->dataTable($data, $total_filtered);
        }
        $categories = Category::get();
        $brands = Brand::get();
        $statuses = ProductStatus::get();
        return view('backend.products.index', compact('categories', 'brands', 'statuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('products create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::active()->get();
        $category_accessories = Category::query()->orderBy('parent_id', 'asc')->active()->get();
        $brands = Brand::active()->get();
        $statuses = ProductStatus::active()->get();
        $optionGroups = OptionGroup::with('options')->active()->get();
        $badges = Badge::active()->get();
        $colors = Color::active()->get();
        $types = Type::active()->get();
        $sizes = Size::active()->get();
        $tabs = ['features', 'naming', 'seo', 'categories', 'brand', 'badges', 'combinations','options', 'statuses'];
        $edit = false;
        return view('backend.products.form', compact('categories',
            'category_accessories', 'brands', 'statuses','sizes',
            'badges', 'colors', 'types', 'tabs', 'edit','optionGroups'));
    }

    public function store(FormProductRequest $request, ProductService $productService, UploadDocumentService $uploadDocumentService)
    {
        abort_if(Gate::denies('products create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $productService->create($request->validated());

            if ($request->hasFile('image'))
                $uploadDocumentService->upload('product', 'image', $productService->product->id, 'product_image', true, $request);

            return redirect(route('backend.products.index'))->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            dd($e->getMessage());
            Log::channel('backend')->error($e->getMessage());
            return redirect(route('backend.products.create'))->with('error', $e->getMessage());
        }
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('products show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('badges', 'productStatuses', 'colors', 'category');

        return view('backend.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('products edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $product->load(['category.options','options']);
        $categories = Category::active()->get();
        $brands = Brand::active()->get();
        $statuses = ProductStatus::active()->get();
        $badges = Badge::active()->get();
        $colors = Color::active()->get();
        $types = Type::active()->get();
        $sizes = Size::active()->get();
        $product->load('badges', 'productStatuses', 'combinations', 'category');
        $tabs = ['features', 'naming', 'seo', 'categories', 'brand', 'badges', 'combinations','options', 'statuses'];
        $edit = true;
        return view('backend.products.form', compact('product', 'categories', 'brands', 'statuses','sizes',
            'badges', 'colors', 'types', 'tabs', 'edit'));
    }

    public function update(FormProductRequest $request, ProductService $productService, Product $product, UploadDocumentService $uploadDocumentService)
    {
        abort_if(Gate::denies('products edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $data = $request->validated();
            $data['product'] = $product;
            $productService->update($data);

            if ($request->hasFile('image'))
                $uploadDocumentService->upload('product', 'image', $productService->product->id, 'product_image', true, $request);

            return redirect(route('backend.products.index'))->withSuccess(trans('backend.messages.success.update'));
        } catch (\Exception $e) {
            dd($e->getMessage());
            Log::channel('backend')->error($e->getMessage());
            return redirect(route('backend.products.index'))->withError(trans('backend.messages.error.update'));
        }
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('products delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            foreach ($product->getDocuments('product_image') as $file) {
                Storage::disk('documents')->delete($file->getAttributes()['document']);
                $file->delete();
            }
            $product->delete();
            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    protected function dataTable($data, $total_filtered)
    {
        return datatables()
            ->of($data)
            ->addColumn('category_name', function ($product) {
                return translation_first($product->category)->name;
            })
            ->addColumn('brand_name', function ($product) {
                return $product->brand->name;
            })
            ->addColumn('image', function (Product $product) {
                if (isset($product)) {
                    $src = $product->first_image ?: asset('backend/img/noimage.jpg');
                }
                return '<img src="' . $src . '" alt="' . $product->name . '" style="width:26px; object-fit: contain;">';
            })
            ->addColumn('name', function (Product $product) {
                return Str::limit($product->name,20);
            })
            ->addColumn('product_status', function (Product $product) {
                $text = '';
                if ($product->productStatuses->count() > 0) {
                    foreach ($product->productStatuses as $status) {
                        $text .= '<span class="badge badge-primary mb-1' . $status->color . '">' . translation_first($status)->name . '</span>';
                    }
                }
                return $text;
            })
            ->addColumn('status', function ($row) {
                return badge($row->status);
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['image', 'product_status', 'price', 'discount_price', 'status', 'actions'])
            ->setTotalRecords($total_filtered)
            ->setFilteredRecords($total_filtered)
            ->skipPaging()
            ->make(true);
    }

    protected function permissions($id)
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('products show')) {
            $result .= "<a href='" . route('backend.products.show', ['product' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('products edit')) {
            $result .= "<a href='" . route('backend.products.edit', ['product' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('products delete')) {
            $result .= "<a href='" . route('backend.products.destroy', ['product' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }


    public function getProductByStatus(Request $request)
    {
        $product_status = ProductStatus::where('product_id', $request->product_id)->get();
        return response()->json($product_status);
    }

    public function getAccessories()
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
