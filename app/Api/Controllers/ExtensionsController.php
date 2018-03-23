<?php

namespace App\Api\Controllers;
use App\Api\Transformers\ExtensionTransformer;
use App\Models\Extension;

/**
 * Class FlowsController
 *
 * @package \App\Api\Controllers
 */
class ExtensionsController extends BaseController
{
    public function index(){
        $extensions= Extension::all()->where('ID', '<','100');
        return $this->collection($extensions,new ExtensionTransformer());
    }
    public function show($main_id){
        $Extension =Extension::all()->where('MAIN_ID', $main_id);
        if($Extension->count() == 0){
            return $this->response->errorNotFound('延期信息不存在');
        }
        return $this->item($Extension,new ExtensionTransformer());
    }
}
