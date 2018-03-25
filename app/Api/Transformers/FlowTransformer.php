<?php

namespace App\Api\Transformers;

use App\Models\Flow;
use App\Models\Post;
use League\Fractal\TransformerAbstract;

/**
 * Class SortTransformer
 *
 * @package \App\Api\Transformer
 */
class FlowTransformer extends TransformerAbstract
{
    public function transform(Flow $flow)
    {
        return [
            'id'=>$flow['ID'],
            'main_id'=>$flow['MAIN_ID'],
            'curr_prcs'=>$flow['CURR_PRCS'],
            'prcs_id'=>$flow['PRCS_ID'],
            'work_states'=>$flow['WORK_STATES'],
            'duty_user'=>$flow['DUTY_USER'],
            'begin_time'=>$flow['BEGIN_TIME'],
            'end_time'=>$flow['END_TIME'],
            'is_duty_user'=>$flow['IS_DUTY_USER'],
            'child_id'=>$flow['CHILD_ID'],
            'project_id'=>$flow['PROJECT_ID'],
            'plan_id'=>$flow['PLAIN_ID'],
            'before_prcs'=>$flow['BEFORE_PRCS'],
            'sort_id'=>$flow['BUSINESS_MATTER_ID'],
            'is_turn_back'=>$flow['IS_TURN_BACK'],
            'created_at'=>$flow['updated_at'],
            'updated_at'=>$flow['updated_at'],
        ];
    }
}
