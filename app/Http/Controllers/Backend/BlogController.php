<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormBlogRequest;
use App\Http\Requests\Backend\FormBrandRequest;
use App\Models\Blog;
use App\Models\Brand;
use App\Services\UploadDocumentService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('blogs index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogs = Blog::query();
        if (request()->ajax()) {
            $limit = request('length');
            $start = request('start');
            $count = Blog::count();
            $data = $blogs->latest()->offset($start)->limit($limit)->get();

            return $this->dataTable($data, $count);
        }

        return view('backend.blogs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('blogs create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = false;
        return view('backend.blogs.form', compact('edit'));
    }

    public function store(FormBlogRequest $request, UploadDocumentService $uploadDocumentService)
    {
        abort_if(Gate::denies('blogs create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $blog = Blog::create([
                'status' => $data['status'],
                'name' => $data['name'],
                'slug' => $data['slug'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $blog->translations()->create([
                    'locale' => $lang->code,
                    'content' => $data['content:' . $lang->code],
                    'meta_title' => $data['meta_title:' . $lang->code],
                    'meta_keywords' => $data['meta_keywords:' . $lang->code],
                    'meta_description' => $data['meta_description:' . $lang->code],
                ]);
            }
            if ($request->hasFile('image'))
                $uploadDocumentService->upload('blog', 'image', $blog->id, 'blog_image', false, $request);

            DB::commit();
            return redirect(route('backend.blogs.index'))->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.create'));
        }
    }

    public function show(Blog $blog)
    {
        abort_if(Gate::denies('blogs show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        abort_if(Gate::denies('blogs edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        return view('backend.blogs.form', compact('blog', 'edit'));
    }

    public function update(FormBlogRequest $request, Blog $blog, UploadDocumentService $uploadDocumentService)
    {
        abort_if(Gate::denies('blogs edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validated();
        DB::beginTransaction();
        try {
            $blog->update([
                'status' => $data['status'],
                'name' => $data['name'],
                'slug' => $data['slug'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $blog->translations()->updateOrcreate(
                    ['locale' => $lang->code],
                    [
                        'content' => $data['content:' . $lang->code],
                        'meta_title' => $data['meta_title:' . $lang->code],
                        'meta_keywords' => $data['meta_keywords:' . $lang->code],
                        'meta_description' => $data['meta_description:' . $lang->code],
                    ]
                );
            }
            if ($request->hasFile('image')) {
                if ($blog->files->where('collection_name','blog_image')->first()) {
                    return redirect()->back()->withWarning(trans('backend.messages.error.removeOldImage'));
                } else {
                    $uploadDocumentService->upload('blog', 'image', $blog->id, 'blog_image', false, $request);
                }
            }
            DB::commit();
            return redirect(route('backend.blogs.index'))->withSuccess(trans('backend.messages.success.update'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.update'));
        }
    }

    public function destroy(Blog $blog)
    {
        abort_if(Gate::denies('blogs delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            foreach ($blog->getDocuments('blog_image') as $file) {
                Storage::disk('documents')->delete($file->getAttributes()['document']);
                $file->delete();
            }
            $blog->delete();
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
                $src = $row->getFirstImageAttribute() ?? asset('backend/img/noimage.jpg');
                return '<img src="' . $src . '" alt="' . $row->id . '" style="width:26px; object-fit: contain;">';
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

        if (admin()->can('blogs show')) {
            $result .= "<a href='" . route('backend.blogs.show', ['blog' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('blogs edit')) {
            $result .= "<a href='" . route('backend.blogs.edit', ['blog' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('blogs delete')) {
            $result .= "<a href='" . route('backend.blogs.destroy', ['blog' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
