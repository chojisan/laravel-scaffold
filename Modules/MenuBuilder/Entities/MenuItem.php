<?php

namespace Modules\MenuBuilder\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\MenuBuilder\Entities\Menu;
use Kalnoy\Nestedset\NodeTrait;

class MenuItem extends Model
{
    use NodeTrait;
    
    protected $fillable = [];

    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')
            ->with('children')
            ->orderBy('order');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
