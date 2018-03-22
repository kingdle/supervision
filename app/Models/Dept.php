<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Dept extends Model
{
    protected $table = 'pro_department';
    /**
     * 部门
     *
     * @var array
     */
    protected $fillable = [
        'DEPT_ID','DEPT_NAME', 'MANAGER', 'ASSISTANT_ID','LEADER1','LEADER2',
    ];

    public function pro_task_main_info()
    {
        $this->hasMany(Post::class, 'DUTY_DEPT');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

}
