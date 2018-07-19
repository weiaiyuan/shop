<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'shop_orders';
    protected $primary_key = 'id'; 
}
