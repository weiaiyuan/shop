<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'order_details';

    public function goods_info()
    {
    	return $this->hasOne('App\Models\Shop_goods','id');
    }
}
