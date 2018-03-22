<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $table = 'pro_followers';
    //关注表Follower
    protected $fillable = ['id','follower_id','followed_id','created_at','updated_at'];

    protected $hidden = [

    ];

}
