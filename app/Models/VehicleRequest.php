<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleRequest extends Model
{

	use SoftDeletes;

	protected $table = "vehicle_requests";

    
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

	
    public function vehicle()
    {
        return $this->hasOne(Vehicle::class, 'id', 'vehicle_id');
    }
	
    public function driver()
    {
        return $this->hasOne(Driver::class, 'id', 'driver_id');
    }

    public function approver()
    {
        return $this->hasMany(ApprovalRequest::class, 'request_id', 'id');
    }
	

}
