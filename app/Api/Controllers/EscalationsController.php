<?php

namespace App\Api\Controllers;
use App\Api\Transformers\EscalationTransformer;
use App\Models\Escalation;

/**
 * Class FlowsController
 *
 * @package \App\Api\Controllers
 */
class EscalationsController extends BaseController
{
    public function index(){
        $escalations= Escalation::paginate(10);
        if($escalations->count() == 0){
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($escalations,new EscalationTransformer());
    }
    public function show($main_id){
        $Escalation =Escalation::all()->where('MAIN_ID', $main_id);
        if($Escalation->count() == 0){
            return $this->response->errorNotFound('进展不存在');
        }
        return $this->item($Escalation,new EscalationTransformer());
    }
}
