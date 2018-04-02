<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Mail;
use Naux\Mail\SendCloudTemplate;

class User extends Authenticatable
{
    protected $table = 'user';
    /**
     * The attributes that are mass a
     * ssignable.
     *
     * @var array
     */
    protected $fillable = [
        'USER_ID','BYNAME','USER_NAME', 'MOBIL_NO', 'EMAIL','AVATAR','DEPT_ID','USER_PRIV_NAME','USER_PRIV'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'PASSWORD'
    ];

    public function follows(){
        return $this->belongsToMany(Post::class,'pro_followes')->withTimestamps();
    }
    public function followThis($project){
//        return $project;
        return $this->follows()->toggle($project);
    }
    public function followed($project){
        return !! $this->follows()->where('PROJECT_ID',$project)->count();
    }


}
