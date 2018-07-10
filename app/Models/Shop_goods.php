<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// class Shop_goods extends Model 
// {
// 	use SoftDeletes;
// }

class Shop_goods extends Model
{
    use SoftDeletes;

	public function goods_info()
    {
    	return $this->hasOne('App\Models\Order_detail','gid');
    }    
}
