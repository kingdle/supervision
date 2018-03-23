<?php

namespace App\Api\Controllers;
use App\Api\Transformers\FlowTransformer;
use App\Models\Flow;

/**
 * Class FlowsController
 *
 * @package \App\Api\Controllers
 */
class FlowsController extends BaseController
{
    public function index(){
        $flows= Flow::all();
        return $this->collection($flows,new FlowTransformer());
    }
    public function show($user_id){
        $flow =Flow::all()->where('DUTY_USER', $user_id);
        if($flow->count() == 0){
            return $this->response->errorNotFound('任务不存在');
        }
        return $this->item($flow,new FlowTransformer());
    }
}
