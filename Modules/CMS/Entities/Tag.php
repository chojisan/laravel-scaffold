<?php

namespace Modules\CMS\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'published'
    ];

    public function article()
    {
        return $this->belongsToMany('Modules\CMS\Entities\Article');
    }
}
