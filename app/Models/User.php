<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Log;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Change "users" table name to "user"
     *
     * @var string
     */
    protected $table = "user";


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        $name = is_string($role) ? $role : $role->name;

        return $this->roles()->where('name', $name)->first() != null ? true : false;
    }

    public function scripts()
    {
        return $this->hasMany(Script::class);
    }
}
