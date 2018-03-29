<?php

namespace App\Api\Controllers;
use App\Api\Transformers\PostTransformer;
use App\Models\Post;
use Illuminate\Http\Request;

/**
 * Class PostController
 *
 * @package \App\Api\Controllers
 */
class PostsController extends BaseController
{
    public function index(){
        $posts= Post::paginate(10);
        if($posts->count() == 0){
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($posts,new PostTransformer());
    }
    public function show($id){
        $post =Post::find($id);
        if(! $post){
            return $this->response->errorNotFound('项目不存在');
        }
        return $this->item($post,new PostTransformer());
    }
    public function user_id($user_id){
        $posts =Post::where('UNDER_TAKE_USER','=',$user_id)->orwhere('DUTY_USER','=', $user_id)->orwhere('BRANCH_LEADER','=', $user_id)->paginate(10);
        if($posts->count() == 0){
            return $this->response->errorNotFound('项目不存在');
        }
        return $this->response->paginator($posts,new PostTransformer());
    }
    public function query_project(Request $request){
        $project= $request->project;
        $posts =Post::where('PROJECT_NAME','like',"%".$project."%")->orwhere('PLAN_NAME','like', "%".$project."%")->orwhere('BUSINESS_MATTER_NAME','like', "%".$project."%")->paginate(10);
        if($posts->count() == 0){
            return $this->response->errorNotFound('项目不存在');
        }
        return $this->response->paginator($posts,new PostTransformer());
    }
    public function query($request){
//        $user_id=$request->user_id;
        return $request;
//        $posts =Post::where('UNDER_TAKE_USER', '=', $user_id)->paginate(10);;
//        if(! $posts){
//            return $this->response->errorNotFound('项目不存在');
//        }
//        return $this->response->paginator($posts,new PostTransformer());
    }

}
