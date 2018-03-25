<?php

namespace App\Api\Transformers;

use App\Models\Post;
use League\Fractal\TransformerAbstract;

/**
 * Class PostTransformer
 *
 * @package \App\Api\Transformer
 */
class PostTransformer extends TransformerAbstract
{
    public function transform(Post $post)
    {
        return [
            'id' => $post['id'],
            'project_id' => $post['PROJECT_ID'],
            'stage_id' => $post['PLAN_ID'],
            'sort_id' => $post['BUSINESS_MATTER_ID'],
            'level' => $post['NODE_LEVEL'],
            'work_states' => $post['WORK_STATES'],
            'leader_user' => $post['BRANCH_LEADER'],
            'duty_user' => $post['DUTY_USER'],
            'owner_user' => $post['UNDER_TAKE_USER'],
            'dept_id' => $post['DUTY_DEPT'],
            'project_name' => $post['PROJECT_NAME'],
            'stage_name' => $post['PLAN_NAME'],
            'sort_name' => $post['BUSINESS_MATTER_NAME'],
            'begin_date' => $post['PLAN_BEGIN_DATE'],
            'end_date' => $post['PLAN_END_DATE'],
            'period' => $post['PERIOD'],
            'expect_date' => $post['EXPECT_DATE'],
            'actual_date' => $post['ACTAL_DATE'],
            'project_natrue' => $post['PROJECT_NATRUE'],
            'top_task' => $post['TOP_TASK'],
            'phase' => $post['PHASE'],
            'attactment_id' => $post['ATTACTMENT_ID'],
            'attactment_name' => $post['ATTACTMENT_NAME'],
            'par_flow_id' => $post['PAR_FLOW_ID'],
            'is_del' => $post['IS_DEL'],
            'launch_user' => $post['LAUNCH_USER'],
            'parent_id' => $post['PARENT_ID'],
            'pro_type' => $post['PRO_TYPE'],
            'shape_x' => $post['shape_x'],
            'shape_y' => $post['shape_y'],
            'created_at' => $post['created_at'],
            'updated_at' => $post['updated_at'],
            'deleted_at' => $post['deleted_at'],
            'release_at' => $post['release_at'],
            'content' => $post['PRO_PROGRESS'],
            'plan' => $post['PRO_PLAN'],
            'icon' => $post['icon'],
            'images' => $post['images'],
        ];
    }

}
