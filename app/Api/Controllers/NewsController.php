<?php

namespace App\Api\Controllers;
use App\Api\Transformers\NewTransformer;
use App\Models\News;

/**
 * Class FlowsController
 *
 * @package \App\Api\Controllers
 */
class NewsController extends BaseController
{
    public function index(){
        $news= News::paginate(10);
        if($news->count() == 0){
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($news,new NewTransformer());
    }
    public function show($main_id){
        $news =News::where('MAIN_ID', $main_id)->paginate(10);
        if($news->count() == 0){
            return $this->response->errorNotFound('消息不存在');
        }
        return $this->response->paginator($news,new NewTransformer());

    }
}
