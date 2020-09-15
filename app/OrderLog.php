<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLog extends Model
{
    function order(){
        return $this->belongsTo(Order::class,'order_id');
    }

}
