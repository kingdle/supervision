<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes, AdminBuilder;

    protected $table = 'pro_task_main_info';
    //信息主表

    protected $fillable = [
        'PROJECT_ID',
        'PLAN_ID',
        'BUSINESS_MATTER_ID',
        'NODE_LEVEL',
        'WORK_STATES',
        'BRANCH_LEADER',
        'DUTY_USER',
        'UNDER_TAKE_USER',
        'DUTY_DEPT',
        'PROJECT_NAME',
        'PLAN_NAME',
        'BUSINESS_MATTER_NAME',
        'PLAN_BEGIN_DATE',
        'PLAN_END_DATE',
        'PERIOD',
        'EXPECT_DATE',
        'ACTAL_DATE',
        'PROJECT_NATRUE',
        'TOP_TASK',
        'PHASE',
        'ATTACTMENT_ID',
        'ATTACTMENT_NAME',
        'PAR_FLOW_ID',
        'IS_DEL',
        'LAUNCH_USER',
        'PARENT_ID',
        'PRO_TYPE',
        'address',
        'gis',
        'deleted_at',
        'release_at',
        'PRO_PROGRESS',
        'PRO_PLAN',
        'icon',
        'images',
];
    public function followers(){
        return $this->belongsToMany(User::class,'pro_followers')->withTimestamps();
    }

    public function pro_users()
    {
        return $this->belongsTo(User::class, 'USER_ID');
    }
    public function pro_department()
    {
        return $this->belongsTo(Dept::class, 'DEPT_ID');
    }
    public function pro_task_flow_runs()
    {
        return $this->hasMany(Flow::class, 'MAIN_ID','ID');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable', 'demo_taggables');
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }

    public function scopeHot($query)
    {
        return $query->where('rate', '>', 1);
    }

    public function scopeReleased($query)
    {
        return $query->where('released', 1);
    }

    public function scopeUnreleased($query)
    {
        return $query->where('released', 0);
    }
    public function getImagesAttribute($images)
    {
        if (is_string($images)) {
            return json_decode($images, true);
        }

        return $images;
    }

    public function setImagesAttribute($images)
    {
        if (is_array($images)) {
            $this->attributes['images'] = json_encode($images);
        }
    }
}
