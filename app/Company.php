<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'email', 'website', 'logo', 'password'];

    protected $hidden = ['password'];

    protected $dates = ['deleted_at'];

    /*
    * Relationship Has To Many 
    * One company have many jobs
    */
    public function jobs()
    {
    	return $this->hasMany('App\Job');
    }

}
