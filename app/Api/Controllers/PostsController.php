<?php

namespace App\Api\Controllers;
use App\Api\Transformers\PostTransformer;
use App\Models\Post;

/**
 * Class PostController
 *
 * @package \App\Api\Controllers
 */
class PostsController extends BaseController
{
    public function index(){
        $posts= Post::all();
        return $this->collection($posts,new PostTransformer());
    }
    public function show($id){
        $post =Post::find($id);
        if(! $post){
            return $this->response->errorNotFound('项目不存在');
        }
        return $this->item($post,new PostTransformer());
    }

}
