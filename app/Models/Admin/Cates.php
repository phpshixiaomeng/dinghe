<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{
    //
	public function games()
	{
		return $this->belongsToMany('App\Models\Admin\Games','game_cates','cid','gid');
	}
}
