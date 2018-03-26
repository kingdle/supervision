<?php

namespace App\Api\Controllers;
use App\Api\Transformers\MatterTransformer;
use App\Models\Matter;
use Illuminate\Http\Request;

/**
 * Class FlowsController
 *
 * @package \App\Api\Controllers
 */
class MattersController extends BaseController
{
    public function index(){
        $matters= Matter::paginate(10);
        if($matters->count() == 0){
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($matters,new MatterTransformer());
    }
    public function show($main_id){
        $matter =Matter::where('MAIN_ID', $main_id)->paginate(10);
        if($matter->count() == 0){
            return $this->response->errorNotFound('延期信息不存在');
        }
        return $this->response->paginator($matter,new MatterTransformer());

    }
    public function store(Request $request, Matter $matter)
    {
        $matter->fill($request->all());
        //        $matter->user_id = $this->user()->id;
        $matter->save();

        return $this->response->item($matter, new MatterTransformer())
            ->setStatusCode(201);
    }
}
