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
        $followers= Follower::all();
        return $this->collection($followers,new FollowerTransformer());
    }
    public function show($id){
        $follower =Flow::find($id);
        if(! $follower){
            return $this->response->errorNotFound('关注信息不存在');
        }
        return $this->item($follower,new FollowerTransformer());
    }
}
