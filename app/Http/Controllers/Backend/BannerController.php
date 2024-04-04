<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormBannerRequest;
use App\Models\Banner;
use App\Services\UploadDocumentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class BannerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('banners index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (request()->ajax()) {
            $count = Banner::count();
            $data = Banner::get();
            return $this->dataTable($data, $count);
        }
        return view('backend.banners.index');
    }

    public function create()
    {
        abort_if(Gate::denies('banners create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = false;
        return view('backend.banners.form', compact('edit'));
    }

    public function store(FormBannerRequest $request, UploadDocumentService $uploadDocumentService)
    {
        abort_if(Gate::denies('banners create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $banner = Banner::create([
                'order' => $data['order'],
                'banner_type' => $data['banner_type'],
                'link' => $data['link'],
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $banner->translations()->create([
                    'locale' => $lang->code,
                    'name' => $data['name:' . $lang->code],
                    'text' => $data['text:' . $lang->code],
                ]);
            }
            if ($request->hasFile('image')) {
                $uploadDocumentService->upload('banner', 'image', $banner->id, 'banner_image', false, $request);
            }
            DB::commit();
            return redirect(route('backend.banners.index'))->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.create'));
        }
    }


    public function show(Banner $banner)
    {
        abort_if(Gate::denies('banners index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.banners.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        abort_if(Gate::denies('banners edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = true;
        return view('backend.banners.form', compact('banner', 'edit'));
    }

    public function update(FormBannerRequest $request, Banner $banner, UploadDocumentService $uploadDocumentService)
    {
        abort_if(Gate::denies('banners edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $banner->update([
                'order' => $data['order'],
                'banner_type' => $data['banner_type'],
                'link' => $data['link'],
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $banner->translations()->updateOrcreate(
                    ['locale' => $lang->code],
                    [
                        'name' => $data['name:' . $lang->code],
                        'text' => $data['text:' . $lang->code],
                    ]
                );
            }
            if ($request->hasFile('image')) {
                if ($banner->files->where('collection_name', 'banner_image')->first()) {
                    return redirect()->back()->withWarning(trans('backend.messages.error.removeOldImage'));
                } else {
                    $uploadDocumentService->upload('banner', 'image', $banner->id, 'banner_image', false, $request);
                }
            }
            DB::commit();
            return redirect(route('backend.banners.index'))->withSuccess(trans('backend.messages.success.update'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.create'));
        }
    }

    public function destroy(Banner $banner)
    {
        abort_if(Gate::denies('banners delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            foreach ($banner->getDocuments('banner_image') as $file) {
                Storage::disk('documents')->delete($file->getAttributes()['document']);
                $file->delete();
            }
            $banner->delete();
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
                $src = $row->first_image ? $row->first_image : asset('backend/img/noimage.jpg');
                return '<img src="' . $src . '" alt="' . $row->id . '" style="width:26px; object-fit: contain;">';
            })
            ->addColumn('name', function ($row) {
                return  translation($row)->name;
            })
            ->addColumn('banner_type', function ($row) {
                return  $row->banner_type;
            })
            ->addColumn('text', function ($row) {
                return  translation($row)->text;
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

    protected function permissions($id)
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('banners index')) {
            $result .= "<a href='" . route('backend.banners.show', ['banner' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('banners edit')) {
            $result .= "<a href='" . route('backend.banners.edit', ['banner' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('banners delete')) {
            $result .= "<a href='" . route('backend.banners.destroy', ['banner' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
