<?php

namespace App\Traits;

use App\Models\Document;

trait DocumentTrait
{
    public function getFirstImageAttribute()
    {
        return $this->files->first()?->document;
    }
    public function getFirstFromImagesAttribute()
    {
        return $this->files->where('order','first')->first()?->document;
    }
    public function getSecondFromImagesAttribute()
    {
        return $this->files->where('order','second')->first()?->document;
    }
    public function getDocuments($collection)
    {
        return $this->files->where('collection_name', $collection);
    }

    public function getDocument($collection)
    {
        return $this->files->where('collection_name', $collection)->first()?->document;
    }

    public function files()
    {
        return $this->morphMany(Document::class, 'manipulationable');
    }

    public function filesFromCollection($collection)
    {
        return $this->morphMany(Document::class, 'manipulationable')
            ->where('collection_name', $collection);
    }



}
