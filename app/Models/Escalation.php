<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escalation extends Model
{
    protected $table = 'pro_escalation';
    //承办人提报表Escalation
    protected $fillable = ['ID', 'MAIN_ID', 'TB_USER_ID', 'TB_CONTENTS', 'TB_PLAN', 'TB_TIEM', 'TB_DEPT_ID', 'IS_DUTY_ESCALATION', 'IS_URDER_ESCALATION', 'attach_id', 'attach_name'];

    protected $hidden = [

    ];
}
