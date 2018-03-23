<?php

namespace App\Api\Transformers;
use App\Models\Flow;
use League\Fractal\TransformerAbstract;

/**
 * Class SortTransformer
 *
 * @package \App\Api\Transformer
 */
class FlowTransformer extends TransformerAbstract
{
    public function transform(Flow $flow){
        return [
            'id'=>$flow['ID'],
            'main_id'=>$flow['MAIN_ID'],//Post主任务ID
            'project_name'=>$flow->PROJECT_NAME,//项目名称
            'stage_name'=>$flow['PLAN_NAME'],//阶段名称
            'sort_name'=>$flow['BUSINESS_MATTER_NAME'],//任务名称
            'curr_prcs'=>$flow['CURR_PRCS'],//1督查人员，2承办人、责任人、分管领导
            'prcs_id'=>$flow['PRCS_ID'],//1承办人，2责任人，3分管领导
            'user_id'=>$flow['DUTY_USER'],//用户名
            'is_turn_back'=>$flow['IS_TURN_BACK'],//是否退回
            'begin_time'=>$flow['BEGIN_TIME'],//计划开始时间
            'end_time'=>$flow['END_TIME'],//计划完成时间
            'is_duty_user'=>$flow['IS_DUTY_USER'],//是否是责任人1是，0不是，督查人员也是1
            'child_id'=>$flow['CHILD_ID'],//子任务id
            'before_prcs'=>$flow['BEFORE_PRCS'],//前置任务
            'work_states'=>$flow['WORK_STATES'],//状态，2办理中，3为办结
//            'id'=>$flow['ID'],
//            'main_id'=>$flow['MAIN_ID'],//Post主任务ID
//            'feed_time'=>$flow['FEED_BACK_TIME'],//最新反馈时间
//            'feed_content'=>$flow['FEED_BACK_CONTENT'],//最新反馈内容
//            'feed_plan'=>$flow['FEED_BACK_PLAN'],//最新反馈计划
//            'feed_user'=>$flow['FEED_USER'],//反馈人
//            'to_user'=>$flow['FEED_TO_USER'],//推送人
//            'parent_id'=>$flow['ATTACTMENT_ID'],//附件id
//            'sort_no'=>$flow['ATTACTMENT_NAME'],//附件名称
//            'end_date'=>$flow['PLAN_END_DATE'],//计划完成日期
        ];
    }
}
