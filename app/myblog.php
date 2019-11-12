<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class myblog extends Model
{
    protected $table='myblogs';
    protected $fillable=['title','summary','details','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comment()
    {
        return $this->hasMany('App\comment');
    }
}
