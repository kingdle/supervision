<?php

namespace App\Api\Controllers;
use App\Api\Transformers\DeptTransformer;
use App\Models\Dept;

/**
 * Class DeptsController
 *
 * @package \App\Api\Controllers
 */
class DeptsController extends BaseController
{
    public function index(){
        $depts= Dept::all();
        return $this->collection($depts,new DeptTransformer());
    }
    public function show($dept_id){
        $dept =Dept::all()->where('DEPT_ID', $dept_id)->first();
        if(! $dept){
            return $this->response->errorNotFound('部门不存在');
        }
        return $this->item($dept,new DeptTransformer());
    }
}
