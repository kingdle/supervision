<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flow extends Model
{
    protected $table = 'pro_task_flow_run';
    //任务表Flow
    protected $fillable = ['ID','MAIN_ID','CURR_PRCS','PRCS_ID','DUTY_USER','IS_TURN_BACK','BEGIN_TIME','END_TIME','IS_DUTY_USER','CHILD_ID','BEFORE_PRCS','WORK_STATES'];

    protected $hidden = [

    ];

    public function pro_users()
    {
        return $this->belongsTo(User::class, 'USER_ID');
    }
    public function pro_task_main_info()
    {
        return $this->belongsTo(Post::class, 'ID','MAIN_ID');
    }
}