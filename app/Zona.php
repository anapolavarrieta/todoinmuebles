<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model {

	public function casas()
	{
		return $this->hasMany('App\Zona')->withTimestamps();
	}	

}
