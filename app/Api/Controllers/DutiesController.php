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
        $duties= Duty::all()->where('ID', '<','100');
        return $this->collection($duties,new DutyTransformer());
    }
    public function show($main_id){
        $Duty =Duty::all()->where('MAIN_ID', $main_id);
        if(! $Duty){
            return $this->response->errorNotFound('进展不存在');
        }
        return $this->item($Duty,new DutyTransformer());
    }
}
