<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    protected $fillable = [
        'name',
        'image',
        'child',
        'user_id'
    ];

    public $timestamps = false;

    public function user(){
        return $this -> belongsTo(User::class);
    }

}
