<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Transformer\PostTransformer;
use Illuminate\Http\Request;

class PostController extends ApiController
{
    protected $PostTransformer;
    public function __construct(PostTransformer $PostTransformer)
    {
        $this->PostTransformer =$PostTransformer;
        $this->middleware('auth.basic',['only'=>['update']]);
    }

    public function index(){
        $posts = Post::all();
        return $this->response([
            'status'=>'success',
            'data'=>$this->PostTransformer->transformCollcetion($posts->toArray())
        ]);
    }
    public function store(Request $request)
    {
//        if(! $request->get('PRO_PROGRESS') or $request->get('PRO_PLAN')){
//            return $this->setStatusCode(422)->responseError('validate fails');
//        }
        Post::create($request->all());
        return $this->setStatusCode(201)->response([
            'status'=>'success',
            'message'=>'post created'
        ]);
    }
    public function update(Request $request)
    {
        dd('store');
    }
    public function show($id){
        $post =Post::find($id);
        if(! $post){
            return $this->responseNotFound();
        }
        return $this->response([
            'status'=>'success',
            'data'=> $this->PostTransformer->transform($post)
        ]);
    }






}
