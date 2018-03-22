<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mpush extends Model
{
    protected $table = 'pro_next_plan';
    //进展推送表Mpush
    protected $fillable = ['ID','MAIN_ID','C_USER_ID','C_PLAN','C_PROCESS','TO_USER_ID','C_TIME','C_USER_STATE'];

    protected $hidden = [

    ];
}
