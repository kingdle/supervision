<?php

namespace App\Api\Controllers;

use App\Api\Transformers\FollowerTransformer;
use App\Models\Follower;
use IAuth;
use Illuminate\Http\Request;

/**
 * Class FlowsController
 *
 * @package \App\Api\Controllers
 */
class FollowersController extends BaseController
{
    public function index()
    {
        $followers = Follower::paginate(10);
        if ($followers->count() == 0) {
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($followers, new FollowerTransformer());
    }

    public function show($USER_ID)
    {
        $follower = Follower::where('USER_ID', $USER_ID)->paginate(10);
        if ($follower->count() == 0) {
            return $this->response->errorNotFound('关注信息不存在');
        }
        return $this->response->paginator($follower, new FollowerTransformer());
    }

    public function follow(Request $request,Follower $follower)
    {
        $USER_ID = $request->USER_ID;
        $PROJECT_ID = $request->PROJECT_ID;
        $query = Follower::where('USER_ID', $USER_ID)->where('PROJECT_ID', $PROJECT_ID);
        if ($query->count() == 0) {
            $follower->fill($request->all());
            $follower->USER_ID = $USER_ID;
            $follower->PROJECT_ID = $PROJECT_ID;
            $follower->created_at = now();
            $follower->save();

            return $this->response->item($follower, new FollowerTransformer())
                ->setStatusCode(201);
        }else{
            $follower = Follower::where('USER_ID', $USER_ID)->where('PROJECT_ID', $PROJECT_ID);
            if ($follower->delete()){
                return json_encode([
                    'message' => '取消关注',
                    'status_code' => 201
                ]);
            }
        }
    }
    public function destroy($id)
    {
        $follower = Follower::findOrFail($id);
        if ($follower->delete()){
            return json_encode([
                'message' => '删除成功',
                'status_code' => 201
            ]);
        }
    }
//    public function unfollow(Request $request,Follower $follower){
//        $USER_ID = $request->USER_ID;
//        $PROJECT_ID = $request->PROJECT_ID;
//        $query = Follower::where('USER_ID', $USER_ID)->where('PROJECT_ID', $PROJECT_ID)->count();
//        if ($query == 0) {
//            $follower->fill($request->all());
//            $follower->USER_ID = $USER_ID;
//            $follower->PROJECT_ID = $PROJECT_ID;
//            $follower->save();
//
//            return $this->response->item($follower, new FollowerTransformer())
//                ->setStatusCode(201);
//        }else{
//            $error = [
//                'message' => '用户已关注',
//                'status_code' => 422
//            ];
//            return json_encode($error);
//        }
//    }
}
