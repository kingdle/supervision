<?php

namespace App\Api\Transformers;
use App\Models\Sort;
use League\Fractal\TransformerAbstract;

/**
 * Class SortTransformer
 *
 * @package \App\Api\Transformer
 */
class SortTransformer extends TransformerAbstract
{
    public function transform(Sort $sort){
        return [
            'id'=>$sort['ID'],
            'sort_name'=>$sort['SORT_NAME'],//任务名称
            'belong_user'=>$sort['BELONG_USER'],//所属用户
            'belong_dept'=>$sort['BELONG_DEPT'],//所属部门
            'belong_role'=>$sort['BELONG_ROLE'],//所属角色
            'parent_id'=>$sort['PARENT_ID'],//0父ID
            'sort_no'=>$sort['SORT_NO'],//阶段顺序
            'is_have_child'=>$sort['IS_HAVE_CHILD'],//是否有子类，0有，1无
            'publish'=>$sort['PUBLISH'],//
            'main_id'=>$sort['MAIN_ID'],//Post主任务ID
        ];
    }
}
