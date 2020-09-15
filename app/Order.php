<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    function log(){
        return $this->hasMany(OrderLog::class,'order_id');
    }
}
