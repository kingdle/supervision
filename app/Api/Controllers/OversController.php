<?php

namespace App\Api\Controllers;
use App\Api\Transformers\OverTransformer;
use App\Models\Over;

/**
 * Class FlowsController
 *
 * @package \App\Api\Controllers
 */
class OversController extends BaseController
{
    public function index(){
        $overs= Over::paginate(10);
        if($overs->count() == 0){
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($overs,new OverTransformer());
    }
    public function show($main_id){
        $Over =Over::all()->where('MAIN_ID', $main_id);
        if($Over->count() == 0){
            return $this->response->errorNotFound('办结信息不存在');
        }
        return $this->item($Over,new OverTransformer());
    }
}
