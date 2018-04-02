<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Dept extends Model
{
    protected $table = 'department';
    /**
     * 部门
     *
     * @var array
     */
    protected $fillable = [
        'DEPT_ID','DEPT_NAME', 'MANAGER', 'ASSISTANT_ID','LEADER1','LEADER2',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

}
