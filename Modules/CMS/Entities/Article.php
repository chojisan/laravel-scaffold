<?php

namespace Modules\CMS\Entities;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'featured',
        'image',
        'parent_id',
        'category_id',
        'author_id',
        'order',
        'status',
        'meta_key',
        'meta_description',
        'meta_data'
    ];

    public function category()
    {
        return $this->belongsTo('Modules\CMS\Entities\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('Modules\CMS\Entities\Tag');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'id', 'author_id');
    }
}
