<?php

namespace App\Api\Transformers;
use App\Models\Over;
use League\Fractal\TransformerAbstract;

/**
 * Class SortTransformer
 *
 * @package \App\Api\Transformer
 */
class OverTransformer extends TransformerAbstract
{
    public function transform(Over $over){
        return [
            'id'=>$over['ID'],
            'main_id'=>$over['MAIN_ID'],//Post主任务ID
            'sort_name'=>$over['MAIN_NAME'],//任务名称
            'pre_type'=>$over['SQ_TYPE'],//是否前置条件,没用到
            'user_id'=>$over['USER_ID'],//申请办结用户名
            'prcs_id'=>$over['PRCS_ID'],//可能是流水号
            'prcs_time'=>$over['PRCS_TIME'],//流程发起时间
            'deliver_time'=>$over['DELIVER_TIME'],//办结审批通过时间
            'content'=>$over['CONTENT'],//办结说明
        ];
    }
}
