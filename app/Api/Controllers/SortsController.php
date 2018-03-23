<?php

namespace App\Api\Controllers;
use App\Api\Transformers\SortTransformer;
use App\Models\Sort;

/**
 * Class SortsController
 *
 * @package \App\Api\Controllers
 */
class SortsController extends BaseController
{
    public function index(){
        $sorts= Sort::paginate(10);
        if($sorts->count() == 0){
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($sorts,new SortTransformer());
    }
    public function show($id){
        $sort =Sort::find($id);
        if(! $sort){
            return $this->response->errorNotFound('分类不存在');
        }
        return $this->item($sort,new SortTransformer());
    }
}
