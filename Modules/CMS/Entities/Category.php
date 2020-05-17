<?php

namespace Modules\CMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'lft',
        'rgt',
        'level',
        'order',
        'published'
    ];

    // Nested set override
    public function getLftName()
    {
        return 'lft';
    }

    public function getRgtName()
    {
        return 'rgt';
    }
/*
    public function parent() {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(self::class, 'parent_id','id');
    }
*/
    public function articles()
    {
        return $this->hasMany('Modules\CMS\Entities\Article');
    }

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }
}
