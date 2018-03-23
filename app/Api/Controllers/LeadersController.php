<?php

namespace App\Api\Controllers;
use App\Api\Transformers\LeaderTransformer;
use App\Models\Leader;

/**
 * Class FlowsController
 *
 * @package \App\Api\Controllers
 */
class LeadersController extends BaseController
{
    public function index(){
        $leaders= Leader::paginate(10);
        if($leaders->count() == 0){
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($leaders,new LeaderTransformer());
    }
    public function show($main_id){
        $Leader =Leader::all()->where('MAIN_ID', $main_id);
        if($Leader->count() == 0){
            return $this->response->errorNotFound('进展不存在');
        }
        return $this->item($Leader,new LeaderTransformer());
//        return $Leader;
    }
}
