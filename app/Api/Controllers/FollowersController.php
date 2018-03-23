<?php

namespace App\Api\Controllers;
use App\Api\Transformers\FollowerTransformer;
use App\Models\Follower;

/**
 * Class FlowsController
 *
 * @package \App\Api\Controllers
 */
class FollowersController extends BaseController
{
    public function index(){
        $followers= Follower::paginate(10);
        if($followers->count() == 0){
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($followers,new FollowerTransformer());
    }
    public function show($id){
        $follower =Follower::find($id);
        if(! $follower){
            return $this->response->errorNotFound('关注信息不存在');
        }
        return $this->item($follower,new FollowerTransformer());
    }
}
