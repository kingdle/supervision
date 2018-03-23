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
        $extensions= Urge::all()->where('ID', '<','100');
        return $this->collection($extensions,new UrgeTransformer());
    }
    public function show($main_id){
        $Urge =Urge::all()->where('MAIN_ID', $main_id);
        if(! $Urge){
            return $this->response->errorNotFound('提示信息不存在');
        }
        return $this->item($Urge,new UrgeTransformer());
    }
}
