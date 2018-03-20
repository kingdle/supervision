<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Mail;
use Naux\Mail\SendCloudTemplate;

class User extends Authenticatable
{
    protected $table = 'pro_user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'USER_ID','USER_NAME', 'MOBIL_NO', 'EMAIL','AVATAR','DEPT_ID',
    ];

    public function pro_task_main_infos()
    {
        $this->hasMany(Post::class, 'UNDER_TAKE_USER');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
    public function sendPasswordResetNotification($token)
    {
        $data = [
            'url' => url('password/reset', $token)
        ];
        $template = new SendCloudTemplate('maxdata_password_reset', $data);

        Mail::raw($template, function ($message){
            $message->from('nkings@163.com', '青岛西海岸');
            $message->to($this->email);
        });
    }
    public function isMember()
    {
        return false;
    }
}
