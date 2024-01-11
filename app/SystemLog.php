<?php

namespace App;

use Carbon\Carbon;


use Illuminate\Database\Eloquent\Model;

class SystemLog extends Model
{
    protected $table = 'system_logs';
	
	public $timestamps = false;

    protected $fillable = [ 'ip', 'user_id', 'time','module','description' ];

    protected $dates = ['time'];

    public function setTimeAttribute($date){
        return $this->attributes['time'] = Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getDOBAttribute($date){
        return (empty($date)|| $date =='0000-00-00 00:00:00' ||$date =='')? NULL: Carbon::parse($date)->format('Y-m-d H:i:s');
    }

}
