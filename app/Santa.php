<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santa extends Model
{
   protected $fillable = [
        'from',
        'to',
        'done',
        'done_at'
   ];

   public $timestamps = false;

  
}
