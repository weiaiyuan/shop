<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Shop_ad extends Model
{
    //
   use SoftDeletes;
   protected $table = 'shop_ad';

}
