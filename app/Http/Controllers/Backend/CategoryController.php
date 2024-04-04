<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormCategoryRequest;
use App\Models\Category;
use App\Models\Language;
use App\Services\UploadDocumentService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class   CategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('categories index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (request()->ajax()) {
            $count = Category::count();
            $data = Category::latest()->get();
            return $this->dataTable($data, $count);
        }
        return view('backend.categories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('categories create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = false;
        $langs = Language::active()->get();
        $categories = Category::get();
        return view('backend.categories.form', compact('edit', 'langs', 'categories'));
    }

    public function store(FormCategoryRequest $request, UploadDocumentService $uploadDocumentService)
    {
        abort_if(Gate::denies('categories create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $category = Category::create([
                'code' => Str::slug($data['name:' . locale()]),
                'status' => $data['status'],
                'parent_id' => array_key_exists($data['parent_id'], $data) ? $data['parent_id'] : null,
                'home' => $data['home'],
                'mega' => $data['mega'],
                'order' => $data['order'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $category->translations()->create([
                    'locale' => $lang->code,
                    'name' => $data['name:' . $lang->code],
                    'slug' => $data['slug:' . $lang->code],
                    'meta_title' => $data['meta_title:' . $lang->code],
                    'meta_description' => $data['meta_description:' . $lang->code],
                ]);
            }

            if ($request->hasFile('image'))
                $uploadDocumentService->upload('category', 'image', $category->id, 'category_image', false, $request);

            DB::commit();
            return redirect(route('backend.categories.index'))->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.create'));
        }
    }

    public function show(Category $category): View
    {
        abort_if(Gate::denies('categories index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        abort_if(Gate::denies('categories edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = true;
        $langs = Language::active()->get();
        $categories = Category::get();
        return view('backend.categories.form', compact('category', 'edit', 'langs', 'categories'));
    }

    public function update(FormCategoryRequest $request, Category $category, UploadDocumentService $uploadDocumentService)
    {
        abort_if(Gate::denies('categories edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $category->update([
                'status' => $data['status'],
                'parent_id' => array_key_exists($data['parent_id'], $data) ? $data['parent_id'] : null,
                'home' => $data['home'],
                'mega' => $data['mega'],
                'order' => $data['order'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $category->translations()->updateOrcreate(
                    ['locale' => $lang->code],
                    [
                        'name' => $data['name:' . $lang->code],
                        'slug' => $data['slug:' . $lang->code],
                        'meta_title' => $data['meta_title:' . $lang->code],
                        'meta_description' => $data['meta_description:' . $lang->code],
                    ]
                );
            }
            if ($request->hasFile('image')) {
                if ($category->files->where('collection_name','category_image')->first()) {
                    return redirect()->back()->withWarning(trans('backend.messages.error.removeOldImage'));
                } else {
                    $uploadDocumentService->upload('category', 'image', $category->id, 'category_image', false, $request);
                }
            }
            DB::commit();
            return redirect(route('backend.categories.index'))->withSuccess(trans('backend.messages.success.update'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error'));
        }
    }


    public function destroy(Category $category)
    {
        abort_if(Gate::denies('categories delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        foreach ($category->getDocuments('category_image') as $file) {
            Storage::disk('documents')->delete($file->getAttributes()['document']);
            $file->delete();
        }
        $category->delete();
        return response(['status' => 1]);
    }

    public function dataTable($data, $count)
    {
        return datatables()
            ->of($data)
            ->addColumn('image', function ($row) {
                $src = $row->getFirstImageAttribute() ? $row->getFirstImageAttribute() : asset('backend/img/noimage.jpg');
                return '<img src="' . $src . '" alt="' . $row->id . '" style="width:26px; object-fit: contain;">';
            })
            ->editColumn('name', function ($row) {
                return $row->translate(locale())->name;
            })
            ->editColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->addColumn('status', function ($row) {
                return badge($row->status);
            })
            ->rawColumns(['actions', 'status','image'])
            ->skipPaging()
            ->setTotalRecords($count)
            ->setFilteredRecords($count)
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('categories index')) {
            $result .= "<a href='" . route('backend.categories.show', ['category' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('categories edit')) {
            $result .= "<a href='" . route('backend.categories.edit', ['category' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('categories delete')) {
            $result .= "<a href='" . route('backend.categories.destroy', ['category' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
