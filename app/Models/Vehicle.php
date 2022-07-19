<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{

	use SoftDeletes;

	protected $table = "vehicles";

	
	public static function boot() {

		parent::boot();
		
		static::creating(function($model)  {
			$model->updated_at = null;
			$model->updated_by = null;
			$model->created_by = \Auth::user()->id;
		});
		
		static::updating(function($model)  {
			$model->updated_by = \Auth::user()->id;
		});

		static::deleting(function($model)  {
			$model->deleted_by = \Auth::user()->id;
			$model->save();
		});

	}
	
}
