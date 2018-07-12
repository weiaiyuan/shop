<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shop_goods;
use Illuminate\Database\Eloquent\SoftDeletes;
class Shop_orders extends Model
{
	use SoftDeletes;			//软删除
	protected $table = 'shop_orders';
	   
}
