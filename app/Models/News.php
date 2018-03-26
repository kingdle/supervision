<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'pro_next_plan';
    //进展推送表Mpush
    protected $fillable = [
        'MAIN_ID',
        'C_USER_ID',
        'C_PROCESS',
        'C_PLAN',
        'TO_USER_ID',
        'C_TIME',
        'C_USER_STATE',
        'role_type',
        'address',
        'gis',
        'files',
        'images',
        'videos',
        'source1',
        'source2',
        'source3',
        'source4',
    ];

    protected $hidden = [

    ];
}
