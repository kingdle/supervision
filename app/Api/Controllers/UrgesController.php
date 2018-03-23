<?php

namespace App\Api\Controllers;
use App\Api\Transformers\UrgeTransformer;
use App\Models\Urge;

/**
 * Class FlowsController
 *
 * @package \App\Api\Controllers
 */
class UrgesController extends BaseController
{
    public function index(){
        $urges= Urge::paginate(10);
        if($urges->count() == 0){
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($urges,new UrgeTransformer());
    }
    public function show($main_id){
        $Urge =Urge::where('MAIN_ID', $main_id)->paginate(10);
        if($Urge->count() == 0){
            return $this->response->errorNotFound('批示信息不存在');
        }
        return $this->response->paginator($Urge,new UrgeTransformer());

    }
}
