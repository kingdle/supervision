<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Over extends Model
{
    protected $table = 'pro_over';
    //办结申请表Over
    protected $fillable = ['ID','MAIN_ID','SQ_TYPE','USER_ID','PRCS_ID','PRCS_TIME','DELIVER_TIME','CONTENT'];

    protected $hidden = [

    ];
}
