<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    protected $fillable = [
        'title',
        'content',
        'account_id'
    ];

    //
}
