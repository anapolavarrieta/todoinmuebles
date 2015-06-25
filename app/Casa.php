<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Casa extends Model {

	protected $fillable=[
		'zona'
	];

	public function zonas()
	{
		return $this->hasOne('App\Zona')->withTimestamps();
	}	

	public function ambientes()
	{
		return $this->belongsToMany('App\Ambiente', 'ambiente_casa')->withTimestamps();
	}

	public function generales()
	{
		return $this->belongsToMany('App\General')->withTimestamps();
	}

	public function servicios()
	{
		return $this->belongsToMany('App\Servicio')->withTimestamps();
	}
}
