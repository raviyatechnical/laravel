<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

	protected $table = 'settings';
	protected $fillable = [
        'key',
        'value'
    ];
    //public  $timestamps = false;
    /*
    public function getImageAttribute($value)
    {
        if(isset($value)){
            $imagepath = env('APP_URL').'storage/app'.$value;
        }else{
            $imagepath =  asset('public/default/auther.png');
        }
        return $imagepath;
    }
    */
   /*
    public function verifyUser()
    {
    return $this->hasOne('App\VerifyUser');
    }
    */
    /*
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    */

}