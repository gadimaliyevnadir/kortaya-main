<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class SubscriberController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subscribers index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (request()->ajax()) {
            $count = Subscriber::count();
            $data = Subscriber::latest()->get();
            return $this->dataTable($data, $count);
        }
        return view('backend.subscribers.index');
    }
    public function show(Subscriber $subscriber): View
    {
        abort_if(Gate::denies('subscribers index'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('backend.subscribers.show', compact('subscriber'));
    }


    public function destroy(Subscriber $subscriber)
    {
        abort_if(Gate::denies('subscribers delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $subscriber->delete();
        return response(['status' => 1]);
    }

    public function dataTable($data, $count)
    {
        return datatables()
            ->of($data)
            ->editColumn('email', function ($row) {
                return $row->email;
            })
            ->editColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['actions'])
            ->skipPaging()
            ->setTotalRecords($count)
            ->setFilteredRecords($count)
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('subscribers index')) {
            $result .= "<a href='" . route('backend.subscribers.show', ['subscriber' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('subscribers delete')) {
            $result .= "<a href='" . route('backend.subscribers.destroy', ['subscriber' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
