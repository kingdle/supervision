<?php

namespace App\Api\Transformers;
use App\Models\Extension;
use League\Fractal\TransformerAbstract;

/**
 * Class SortTransformer
 *
 * @package \App\Api\Transformer
 */
class ExtensionTransformer extends TransformerAbstract
{
    public function transform(Extension $extension){
        return [
            'id'=>$extension['ID'],
            'main_id'=>$extension['MAIN_ID'],//Post主任务ID
            'sort_name'=>$extension['MAIN_NAME'],//任务名称
            'pre_type'=>$extension['SQ_TYPE'],//是否前置条件,没用到
            'user_id'=>$extension['USER_ID'],//申请延期用户名
            'prcs_id'=>$extension['PRCS_ID'],//可能是流水号
            'prcs_time'=>$extension['PRCS_TIME'],//流程发起时间
            'extension_time'=>$extension['EXTENSION_TIME'],//延期时间
            'deliver_time'=>$extension['DELIVER_TIME'],//延期审批通过时间
            'content'=>$extension['CONTENT'],//延期说明
        ];
    }
}
