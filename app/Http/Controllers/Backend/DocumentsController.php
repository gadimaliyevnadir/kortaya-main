<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DocumentsController extends Controller
{
    public function deleteDocument(Document $document)
    {
        try {
            if ($document) {
                Storage::disk('documents')->delete($document->getAttributes()['document']);
            }
            $document->delete();
            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }
    public function setMain(Document $document)
    {
        try {
            $query = Document::where('manipulationable_type', $document->manipulationable_type)
                ->where('manipulationable_id', $document->manipulationable_id);
            $query->update(['status' => null]);

            $document->status = 'main';
            $document->save();
            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }
    public function setOrder(Document $document)
    {
        try {
            $query = Document::where('manipulationable_type', $document->manipulationable_type)
                ->where('manipulationable_id', $document->manipulationable_id);
            $query->update(['order' => 'all']);

            $document->order = 'second';
            $document->save();
            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

}
