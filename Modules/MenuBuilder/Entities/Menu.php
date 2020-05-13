<?php

namespace Modules\MenuBuilder\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\MenuBuilder\Entities\MenuItem;

class Menu extends Model
{
    protected $fillable = [];

    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function parent_items()
    {
        return $this->hasMany(MenuItem::class)
            ->whereNull('parent_id');
    }
}
