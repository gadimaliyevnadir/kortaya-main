<?php

namespace App\Traits;

use App\Models\Document;
use App\Models\Media;

trait MediaTrait
{
    public function getFirstImageAttribute()
    {
        return $this->files->first()?->document;
    }
    public function getFirstFromImagesAttribute()
    {
        return $this->files->where('status','main')->first() ? $this->files->where('status','main')->first()?->document : $this->files->first()?->document;
    }
    public function getIconAttribute()
    {
        return $this->files->where('status','icon')->first() ? $this->files->where('status','icon')->first()?->document : $this->files->first()?->document;
    }
    public function getSecondFromImagesAttribute()
    {
        return $this->files->where('order','second')->first()?->document;
    }

//    public function getFirstFromImagesAttribute()
//    {
//        return $this->files->where('status','main')->first() ? $this->files->where('status','main')->first()?->document : $this->files->first()?->document;
//    }
//    public function getSecondFromImagesAttribute()
//    {
//        return  $this->files->where('status','!=','main')->first() ? $this->files->where('status','!=','main')->first()?->document : $this->files->first()?->document;
//    }
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
