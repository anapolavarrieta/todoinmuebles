<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model {

	public function casas()
	{
		return $this->belongsToMany('App\Casa');
	}

}