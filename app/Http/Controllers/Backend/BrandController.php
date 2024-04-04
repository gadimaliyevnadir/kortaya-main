<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormBrandRequest;
use App\Models\Brand;
use App\Services\UploadDocumentService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('brands index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::query();
        if (request()->ajax()) {
            $limit = request('length');
            $start = request('start');
            $count = Brand::count();
            $data = $brands->latest()->offset($start)->limit($limit)->get();

            return $this->dataTable($data, $count);
        }

        return view('backend.brands.index');
    }

    public function create()
    {
        abort_if(Gate::denies('brands create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = false;
        return view('backend.brands.form', compact('edit'));
    }

    public function store(FormBrandRequest $request, UploadDocumentService $uploadDocumentService)
    {
        abort_if(Gate::denies('brands create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $brand = Brand::create([
                'status' => $data['status'],
                'name' => $data['name'],
                'slug' => $data['slug'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $brand->translations()->create([
                    'locale' => $lang->code,
                    'meta_title' => $data['meta_title:' . $lang->code],
                    'meta_keywords' => $data['meta_keywords:' . $lang->code],
                    'meta_description' => $data['meta_description:' . $lang->code],
                ]);
            }
            if ($request->hasFile('image'))
                $uploadDocumentService->upload('brand', 'image', $brand->id, 'brand_image', false, $request);

            DB::commit();
            return redirect(route('backend.brands.index'))->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.create'));
        }
    }

    public function show(Brand $brand)
    {
        abort_if(Gate::denies('brands show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.brands.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        abort_if(Gate::denies('brands edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        return view('backend.brands.form', compact('brand', 'edit'));
    }

    public function update(FormBrandRequest $request, Brand $brand, UploadDocumentService $uploadDocumentService)
    {
        abort_if(Gate::denies('brands edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validated();
        DB::beginTransaction();
        try {
            $brand->update([
                'status' => $data['status'],
                'name' => $data['name'],
                'slug' => $data['slug'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $brand->translations()->updateOrcreate(
                    ['locale' => $lang->code],
                    [
                        'meta_title' => $data['meta_title:' . $lang->code],
                        'meta_keywords' => $data['meta_keywords:' . $lang->code],
                        'meta_description' => $data['meta_description:' . $lang->code],
                    ]
                );
            }
            if ($request->hasFile('image')) {
                if ($brand->files->where('collection_name','brand_image')->first()) {
                    return redirect()->back()->withWarning(trans('backend.messages.error.removeOldImage'));
                } else {
                    $uploadDocumentService->upload('slider', 'image', $brand->id, 'brand_image', false, $request);
                }
            }
            DB::commit();
            return redirect(route('backend.brands.index'))->withSuccess(trans('backend.messages.success.update'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.update'));
        }
    }

    public function destroy(Brand $brand)
    {
        abort_if(Gate::denies('brands delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            foreach ($brand->getDocuments('brand_image') as $file) {
                Storage::disk('documents')->delete($file->getAttributes()['document']);
                $file->delete();
            }
            $brand->delete();
            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }
    public function dataTable($data, $count)
    {
        return datatables()
            ->of($data)
            ->addColumn('image', function ($row) {
                $src = $row->getFirstImageAttribute() ? $row->getFirstImageAttribute() : asset('backend/img/noimage.jpg');
                return '<img src="' . $src . '" alt="' . $row->id . '" style="width:26px; object-fit: contain;">';
            })
            ->addColumn('description', function ($row) {
                return Str::limit($row->translate(default_lang())->meta_description, 60);
            })
            ->addColumn('status', function ($row) {
                return badge($row->status);
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['image', 'status', 'actions'])
            ->skipPaging()
            ->setTotalRecords($count)
            ->setFilteredRecords($count)
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('brands show')) {
            $result .= "<a href='" . route('backend.brands.show', ['brand' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('brands edit')) {
            $result .= "<a href='" . route('backend.brands.edit', ['brand' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('brands delete')) {
            $result .= "<a href='" . route('backend.brands.destroy', ['brand' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
