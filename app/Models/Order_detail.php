<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shop_goods;
class Order_detail extends Model
{
    protected $table = 'order_details';
    protected $primary_key = 'id';

    public function goods_info()
    {
    	 // return $this->hasOne('App\Models\Shop_goods','gid');
    }
}
