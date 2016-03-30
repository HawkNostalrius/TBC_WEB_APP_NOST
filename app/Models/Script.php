<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    protected $table = "script";

    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
