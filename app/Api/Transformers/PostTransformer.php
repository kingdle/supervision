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
    public function transform(Post $post){
        return [
            'id'=>$post['id'],
            'project_id'=>$post['PROJECT_ID'],//项目id
            'stage_id'=>$post['PLAN_ID'],//阶段id
            'sort_id'=>$post['BUSINESS_MATTER_ID'],//任务id
            'project_name'=>$post['PROJECT_NAME'],//项目名称
            'stage_name'=>$post['PLAN_NAME'],//阶段名称
            'sort_name'=>$post['BUSINESS_MATTER_NAME'],//任务名称
            'leader_user'=>$post['BRANCH_LEADER'],//分管领导用户名
            'duty_user'=>$post['DUTY_USER'],//责任人用户名
            'owner_user'=>$post['UNDER_TAKE_USER'],//承办人用户名
            'dept_id'=>$post['DUTY_DEPT'],//责任部门id
            'begin_date'=>$post['PLAN_BEGIN_DATE'],//计划开始日期
            'end_date'=>$post['PLAN_END_DATE'],//要求完成日期
            'expect_date'=>$post['EXPECT_DATE'],//预计完成日期
            'actual_date'=>$post['ACTAL_DATE'],//实际完成日期
            'launch_user'=>$post['LAUNCH_USER'],//督查管理员用户名
            'created_at'=>$post['created_at'],//创建时间
            'updated_at'=>$post['updated_at'],//更新时间
            'deleted_at'=>$post['deleted_at'],//删除时间
            'release_at'=>$post['release_at'],//释放时间
            'content'=>$post['PRO_PROGRESS'],//最新进展内容
            'plan'=>$post['PRO_PLAN'],//最新下一步计划
            'work_states'=>$post['WORK_STATES'],//状态（1保存，2正常，3办结）
            'images'=>$post['images']//项目图片头像
        ];
    }

}
