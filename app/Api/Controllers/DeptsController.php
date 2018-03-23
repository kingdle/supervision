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
        $depts= Dept::paginate(20);
        if($depts->count() == 0){
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($depts,new DeptTransformer());
    }
    public function show($dept_id){
        $dept =Dept::all()->where('DEPT_ID', $dept_id)->first();
        if(! $dept){
            return $this->response->errorNotFound('部门不存在');
        }
        return $this->item($dept,new DeptTransformer());
    }
}
