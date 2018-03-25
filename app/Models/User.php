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
     * The attributes that are mass a
     * ssignable.
     *
     * @var array
     */
    protected $fillable = [
        'UID','USER_ID','BYNAME','USER_NAME', 'MOBIL_NO', 'EMAIL','AVATAR','DEPT_ID','USER_PRIV_NAME','USER_PRIV'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'PASSWORD'
    ];


}
