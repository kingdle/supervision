<?php

namespace App\Api\Transformers;
use App\Models\Escalation;
use League\Fractal\TransformerAbstract;

/**
 * Class SortTransformer
 *
 * @package \App\Api\Transformer
 */
class EscalationTransformer extends TransformerAbstract
{
    public function transform(Escalation $escalation){
        return [
            'id'=>$escalation['ID'],
            'main_id'=>$escalation['MAIN_ID'],//Post主任务ID
            'user_id'=>$escalation['TB_USER_ID'],//提报用户名
            'feedback_content'=>$escalation['TB_CONTENTS'],//最新反馈内容
            'feedback_plan'=>$escalation['TB_PLAN'],//最新反馈计划
            'feedback_time'=>$escalation['TB_TIEM'],//提报时间
            'dept_id'=>$escalation['TB_DEPT_ID'],//部门ID
            'is_duty'=>$escalation['IS_DUTY_ESCALATION'],//是否责任人
            'is_urder'=>$escalation['IS_URDER_ESCALATION'],//
            'attach_id'=>$escalation['attach_id'],//附件id
            'attach_name'=>$escalation['attach_name'],//附件名
        ];
    }
}
