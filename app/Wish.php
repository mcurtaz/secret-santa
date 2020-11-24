<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    protected $fillable =[
        'price',
        'author',
        'target',
        'name',
        'description',
        'link'
    ];
}
