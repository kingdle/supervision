<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rtime extends Model
{
    protected $table = 'pro_tb_date';
    //提报时间配置表Rtime
    protected $fillable = ['TB_ID','TB_TIME','TB_WEEK'];

    protected $hidden = [

    ];
}
