<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bleader extends Model
{
    protected $table = 'pro_feed_back_info';
    //责任人回复表Bleader
    protected $fillable = ['ID','MAIN_ID','FEED_BACK_TIME','FEED_USER','FEED_TO_USER','ATTACTMENT_ID','ATTACTMENT_NAME','PLAN_END_DATE','FEED_BACK_PLAN'];

    protected $hidden = [

    ];
}
