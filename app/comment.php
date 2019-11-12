<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table='comments';
    protected $fillable=['user_id','post_id','comments'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function myblog()
    {
        return $this->belongsTo('App\myblog');
    }
}
