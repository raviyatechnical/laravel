<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPosting extends Model
{
    //use SoftDeletes;
    //protected $primaryKey = 'id';

	protected $table = 'blog_postings';
	protected $fillable = ['headline','articlebody'];
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