<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    protected $table = 'pro_task_sort';

    protected $fillable = ['ID','SORT_NAME','BELONG_USER','BELONG_DEPT','BELONG_ROLE','PARENT_ID','SORT_NO','IS_HAVE_CHILD','PUBLISH','MAIN_ID','SORT_TYPE','SORT_ID'];

    protected $hidden = [

    ];
}
