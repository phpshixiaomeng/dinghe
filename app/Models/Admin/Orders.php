<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    public function gameorder()
    {
    	return $this->belongsToMany('App\Models\Admin\Games','order_details','order_id','game_id');
    }
}
