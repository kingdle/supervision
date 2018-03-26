<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'pro_images';

    protected $fillable = ['MAIN_ID','user_id','type','filename', 'path'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
