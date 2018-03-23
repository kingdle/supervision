<?php

namespace App\Api\Transformers;
use App\Models\Dept;
use League\Fractal\TransformerAbstract;

/**
 * Class DeptTransformer
 *
 * @package \App\Api\Transformers
 */
class DeptTransformer extends TransformerAbstract
{
    public function transform(Dept $dept){
        return [
            'id'=>$dept['DEPT_ID'],
            'dept_name'=>$dept['DEPT_NAME'],//部门名称
            'manager'=>$dept['MANAGER'],//责任人
            'assistant_id'=>$dept['ASSISTANT_ID'],//助理
            'leader1'=>$dept['LEADER1'],//分管领导
            'leader2'=>$dept['LEADER2'],//集团领导
            'dept_parent'=>$dept['DEPT_PARENT'],//上级部门
        ];
    }
}
