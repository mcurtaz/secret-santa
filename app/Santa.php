<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santa extends Model
{
   protected $fillable = [
        'from',
        'to',
        'done'
   ];

   public $timestamps = false;

  
}
