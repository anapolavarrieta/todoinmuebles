<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model {

	public function casas()
	{
		return $this->belongsToMany('App\Casa');
	}

}