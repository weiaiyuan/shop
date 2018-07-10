<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ShopUsers extends Model
{
     public $table = 'shop_users';
    use SoftDeletes;
  
}
