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
        $flows= Flow::paginate(10);
        if($flows->count() == 0){
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($flows,new FlowTransformer());
    }
    public function show($user_id){
        $flow =Flow::where('DUTY_USER','=',$user_id)->paginate(10);
        if($flow->count() == 0){
            return $this->response->errorNotFound('任务不存在');
        }
        return $this->response->paginator($flow,new FlowTransformer());
    }
}
