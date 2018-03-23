<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Urge extends Model
{
    protected $table = 'pro_task_urge';
    //系统提醒工作提报/延期/办结表Urge
    protected $fillable = ['ID','MAIN_ID','URGE_TYPE','URGE_USER','URGE_CONTENTS','URGE_TIEM'];

    protected $hidden = [

    ];
}
