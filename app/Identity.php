<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    protected $fillable = [
        'name',
        'image',
        'child'
    ];

    public $timestamps = false;
}
