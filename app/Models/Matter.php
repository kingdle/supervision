<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    protected $table = 'pro_extension';
    //延期申请表Extension
    protected $fillable = [
        'matter_id',
        'work_states',
        'duty_user',
        'content',
        'reply_time',
        'reply_user',
        'project_id',
        'plan_id',
        'sort_id',
        'source1',
        'source2',
        'source3',
        'source4',
        'main_id',
    ];

    protected $hidden = [

    ];
}
