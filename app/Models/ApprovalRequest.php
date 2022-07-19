<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ApprovalRequest extends Model
{

    public $timestamps = false;
	
	protected $table = "approval_requests";

    
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'approver');
    }


}
