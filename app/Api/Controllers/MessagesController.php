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
        $flows= Message::all()->where('ID', '<','100');
        return $this->collection($flows,new MessageTransformer());
    }
    public function show($main_id){
        $Message =Message::all()->where('MAIN_ID', $main_id);
        if($Message->count() == 0){
            return $this->response->errorNotFound('消息不存在');
        }
        return $this->item($Message,new MessageTransformer());
    }
}
