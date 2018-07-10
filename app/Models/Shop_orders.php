<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shop_goods;
class Shop_orders extends Model
{
	protected $table = 'shop_orders';
	// 配置一对一关系
	public function goods_info()
	{
		return $this->hasOne('App\Models\Shop_goods','id');
	}    
}
