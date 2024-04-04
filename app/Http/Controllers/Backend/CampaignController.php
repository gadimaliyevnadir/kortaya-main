<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormCampaignRequest;
use App\Models\Brand;
use App\Models\Campaign;
use App\Models\Category;
use App\Services\UploadDocumentService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class CampaignController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('campaigns index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            return $this->dataTable(Campaign::all());
        }

        return view('backend.campaigns.index');

    }

    public function create()
    {
        abort_if(Gate::denies('campaigns create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = false;
        $categories = Category::all();
        $brands = Brand::all();

        return view('backend.campaigns.form', compact('edit', 'categories', 'brands'));

    }

    public function store(FormCampaignRequest $request, UploadDocumentService $uploadDocumentService)
    {
        abort_if(Gate::denies('campaigns create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $brand = Campaign::create([
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $brand->translations()->create([
                    'locale' => $lang->code,
                    'name' => $data['name:' . $lang->code],
                    'slug' => $data['slug:' . $lang->code],
                    'title' => $data['title:' . $lang->code],
                    'keywords' => $data['keywords:' . $lang->code],
                    'description' => $data['description:' . $lang->code],
                    'text' => $data['text:' . $lang->code],
                ]);
            }
            if ($request->hasFile('image'))
                $uploadDocumentService->upload('campaign', 'image', $brand->id, 'campaign_image', false, $request);

            DB::commit();
            return redirect(route('backend.campaigns.index'))->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.create'));
        }
    }

    public function show(Campaign $campaign)
    {
        abort_if(Gate::denies('campaigns show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.campaigns.show', compact('campaign'));

    }

    public function edit(Campaign $campaign)
    {
        abort_if(Gate::denies('campaigns edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        $categories = Category::all();
        $brands = Brand::all();


        return view('backend.campaigns.form', compact('campaign', 'edit', 'categories', 'brands'));

    }

    public function update(FormCampaignRequest $request, Campaign $campaign, UploadDocumentService $uploadDocumentService)
    {
        abort_if(Gate::denies('campaigns edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validated();
        DB::beginTransaction();
        try {
            $campaign->update([
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $campaign->translations()->updateOrcreate(
                    ['locale' => $lang->code],
                    [
                        'name' => $data['name:' . $lang->code],
                        'slug' => $data['slug:' . $lang->code],
                        'title' => $data['title:' . $lang->code],
                        'keywords' => $data['keywords:' . $lang->code],
                        'description' => $data['description:' . $lang->code],
                        'text' => $data['text:' . $lang->code],
                    ]
                );
            }
            if ($request->hasFile('image')) {
                if ($campaign->files->where('collection_name', 'campaign_image')->first()) {
                    return redirect()->back()->withWarning(trans('backend.messages.error.removeOldImage'));
                } else {
                    $uploadDocumentService->upload('campaign', 'image', $campaign->id, 'campaign_image', false, $request);
                }
            }
            DB::commit();
            return redirect(route('backend.campaigns.index'))->withSuccess(trans('backend.messages.success.update'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.update'));
        }
    }

    public function destroy(Campaign $campaign)
    {
        abort_if(Gate::denies('campaigns delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            foreach ($campaign->getDocuments('campaign_image') as $file) {
                Storage::disk('documents')->delete($file->getAttributes()['document']);
                $file->delete();
            }
            $campaign->delete();
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
            ->addColumn('image', function ($row) {
                $src = $row->getFirstImageAttribute() ? $row->getFirstImageAttribute() : asset('backend/img/noimage.jpg');
                return '<img src="' . $src . '" alt="' . $row->id . '" style="width:26px; object-fit: contain;">';
            })
            ->addColumn('name', function ($row) {
                return translation_first($row)->name;
            })
            ->addColumn('description', function ($row) {
                return translation_first($row)->description;
            })
            ->addColumn('status', function ($row) {
                return badge($row->status);
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at->format('d-m-Y H:i:s');
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['image', 'status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('campaigns show')) {
            $result .= "<a href='" . route('backend.campaigns.show', ['campaign' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('campaigns edit')) {
            $result .= "<a href='" . route('backend.campaigns.edit', ['campaign' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('campaigns delete')) {
            $result .= "<a href='" . route('backend.campaigns.destroy', ['campaign' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }


}
