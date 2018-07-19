<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ShopUsers extends Model
{
	public $table = 'shop_users';
	use SoftDeletes;




	//设置用户跟订单表的一对多关系
	public function duiding()
	{
		return $this->hasMany('App\Models\Shop_orders','uid');
	}
}
