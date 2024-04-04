<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormHomeCatProductRequest;
use App\Models\Category;
use App\Models\HomeCatProduct;
use App\Services\MediaLibrary\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HomeCatProductController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('home-cat-products index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            return $this->dataTable(HomeCatProduct::all());
        }

        return view('backend.home_cat_products.index');
    }

    public function create()
    {
        abort_if(Gate::denies('home-cat-products create'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $edit = false;
        $categories = Category::active()->where('parent_id',0)->get();

        return view('backend.home_cat_products.form', compact('edit', 'categories'));
    }

    public function store(FormHomeCatProductRequest $request, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('home-cat-products create'), Response::HTTP_FORBIDDEN,'403 Forbidden');

      $home_cat_product = HomeCatProduct::create($request->validated());

        if ($request->hasFile('image')) {
            if (!empty($home_cat_product->getFirstMedia('home_cat_image'))) {
                return redirect()->back()->withWarning(trans('backend.messages.error.removeOldImage'));
            } else {
                $uploadImageService->upload($home_cat_product, 'image', 'home_cat_image', false, false);
            }
        }

        return redirect(route('backend.home-cat-products.index'))->withSuccess(trans('backend.messages.success.create'));

    }

    public function show(HomeCatProduct $home_cat_product)
    {
        abort_if(Gate::denies('home-cat-products show'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        return view('backend.home_cat_products.show', compact('home_cat_product'));
    }

    public function edit(HomeCatProduct $home_cat_product)
    {
        abort_if(Gate::denies('home-cat-products edit'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $edit=true;
        $categories = Category::active()->where('parent_id',0)->get();

        return view('backend.home_cat_products.form', compact('edit', 'home_cat_product', 'categories'));
    }

    public function update(FormHomeCatProductRequest $request, HomeCatProduct $home_cat_product, UploadImageService $uploadImageService)
    {
        abort_if(Gate::denies('home-cat-products edit'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        $home_cat_product->update($request->validated());

        if ($request->hasFile('image')) {
            if (!empty($home_cat_product->getFirstMedia('home_cat_image'))) {
                return redirect()->back()->withWarning(trans('backend.messages.error.removeOldImage'));
            } else {
                $uploadImageService->upload($home_cat_product, 'image', 'home_cat_image', false, false);
            }
        }

        return redirect(route('backend.home-cat-products.index'))->withSuccess(trans('backend.messages.success.update'));

    }

    public function destroy(HomeCatProduct $home_cat_product)
    {
        abort_if(Gate::denies('home-cat-products delete'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        try
        {
            $home_cat_product->delete();

            return response(['status' => 1]);
        }

        catch (\Exception $e)
        {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function deleteimg(Request $request)
    {
        abort_if(Gate::denies('home-cat-products delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $media = Media::findOrFail($request['id']);

            $media->delete();

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
            ->addColumn('name', function ($row) {
                return $row->category->transname ?? '';
            })
            ->addColumn('image', function($row)
            {
                $src = $row->getFirstMediaUrl('home_cat_image','thumb-small') ?: asset('backend/img/noimage.jpg');

                return '<img src="'.$src.'" alt="'.$row->category->transname.'" style="width:26px; object-fit: contain;">';
            })

            ->addColumn('status', function($row)
            {
                return badge($row->status);
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['image','status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('home-cat-products show')) {
            $result .= "<a href='" . route('backend.home-cat-products.show', ['home_cat_product' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('home-cat-products edit')) {
            $result .= "<a href='" . route('backend.home-cat-products.edit', ['home_cat_product' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('home-cat-products delete')) {
            $result .= "<a href='" . route('backend.home-cat-products.destroy', ['home_cat_product' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
