<?php

namespace App\Api\Controllers;
use App\Api\Transformers\UserTransformer;
use App\Models\User;
use Illuminate\Support\Facades\DB;

/**
 * Class UsersController
 *
 * @package \App\Api\Controllers
 */
class UsersController extends BaseController
{
    public function index(){
        $users= User::paginate(10);
        if($users->count() == 0){
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($users,new UserTransformer());
    }
    public function show($user_id){
        $user =User::where('USER_ID', $user_id)->first();
        if(! $user){
            return $this->response->errorNotFound('用户不存在');
        }
        return $this->item($user,new UserTransformer());
    }
}
