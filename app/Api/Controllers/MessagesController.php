<?php

namespace App\Api\Controllers;
use App\Api\Transformers\MessageTransformer;
use App\Models\Message;

/**
 * Class FlowsController
 *
 * @package \App\Api\Controllers
 */
class MessagesController extends BaseController
{
    public function index(){
        $messages= Message::paginate(10);
        if($messages->count() == 0){
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($messages,new MessageTransformer());
    }
    public function show($main_id){
        $Message =Message::where('MAIN_ID', $main_id)->paginate(10);
        if($Message->count() == 0){
            return $this->response->errorNotFound('消息不存在');
        }
        return $this->response->paginator($Message,new MessageTransformer());

    }
}
