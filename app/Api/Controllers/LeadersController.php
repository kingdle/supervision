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
        $leaders= Leader::all()->where('ID', '<','100');
        return $this->collection($leaders,new LeaderTransformer());
    }
    public function show($main_id){
        $Leader =Leader::all()->where('MAIN_ID', $main_id);
        if(! $Leader){
            return $this->response->errorNotFound('进展不存在');
        }
        return $this->item($Leader,new LeaderTransformer());
    }
}
