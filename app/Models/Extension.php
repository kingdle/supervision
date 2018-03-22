<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    protected $table = 'pro_extension';
    //延期申请表Extension
    protected $fillable = ['ID','MAIN_ID','SQ_TYPE','USER_ID','PRCS_ID','PRCS_TIME','EXTENSION_TIME','DELIVER_TIME','CONTENT'];

    protected $hidden = [

    ];
}
