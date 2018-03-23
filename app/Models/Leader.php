<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    protected $table = 'pro_feed_back_reply';
    //分管领导批示表Gleader
    protected $fillable = ['ID','MAIN_ID','FEED_ID','REPLY_TIME','PEPLY_USER','REPLAY_CONTENTS','FROM_MEETING','MEETING_TIME','PEPLY_TO_USER'];

    protected $hidden = [

    ];
}
