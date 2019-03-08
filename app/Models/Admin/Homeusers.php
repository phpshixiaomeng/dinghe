<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Homeusers extends Model
{
    //
    public $table = 'home_users';
    public function gameslist()
    {
    	return $this->belongsToMany('App\Models\Admin\Games','carts','user_id','game_id');
    }

    public function price()
    {
    	return $this->belongsToMany('App\Models\Admin\Games','cache','uid','gid');
    }
}
