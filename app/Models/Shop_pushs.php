<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Shop_pushs extends Model
{
    //
    public $timestamps = false;
    use softDeletes;
   
}
