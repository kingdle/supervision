<?php

namespace App\Api\Controllers;
use App\Api\Transformers\DutyTransformer;
use App\Models\Duty;

/**
 * Class FlowsController
 *
 * @package \App\Api\Controllers
 */
class DutiesController extends BaseController
{
    public function index(){
        $duties= Duty::paginate(10);
        if($duties->count() == 0){
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($duties,new DutyTransformer());
    }
    public function show($main_id){
        $Duty =Duty::all()->where('MAIN_ID', $main_id);
        if($Duty->count() == 0){
            return $this->response->errorNotFound('进展不存在');
        }
        return $this->item($Duty,new DutyTransformer());
    }
}
