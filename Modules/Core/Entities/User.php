<?php

namespace Modules\Core\Entities;

use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends \App\User
{
    use HasApiTokens, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    public function articles()
    {
        return $this->hasMany('Modules\CMS\Entities\Article', 'author_id', 'id');
    }
}
