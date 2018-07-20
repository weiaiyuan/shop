<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Shop_shet extends Model
{
    protected $table = 'shop_shet';
    use SoftDeletes;
}
