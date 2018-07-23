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
    public function userinfo()
    {
    	return $this->hasOne('App\Models\Shop_pushs','uid');
    }
    public function goshop()
    {
    	return $this->hasOne('App\Models\Goshop','gid');
    }
    public function shuyu() 
    {
    	return $this->beLongsTo('App\Models\Soucang','sid');
    }
    public function order()
    {
        return $this->hasOne('App\Models\Shop_orders','gid');
    }
}
