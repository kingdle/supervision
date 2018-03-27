<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $table = 'pro_followers';
    //关注表Follower
    protected $fillable = ['user_id','PROJECT_ID'];

    protected $hidden = [

    ];

}
