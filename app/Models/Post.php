<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes, AdminBuilder;

    protected $table = 'pro_task_main_info';

    protected $casts = [
        'extra' => 'json',
    ];
    protected $fillable = ['PROJECT_ID','PLAN_ID','WORK_STATES','DUTY_USER','DUTY_DEPT','UNDER_TAKE_USER','PLAN_BEGIN_DATE','PLAN_END_DATE','PROJECT_NAME','PLAN_NAME','BUSINESS_MATTER_NAME','PRO_PROGRESS','PRO_PLAN','created_at','updated_at','deleted_at'];


    public function pro_users()
    {
        return $this->belongsTo(User::class, 'USER_ID');
    }
    public function pro_department()
    {
        return $this->belongsTo(Dept::class, 'DEPT_ID');
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
