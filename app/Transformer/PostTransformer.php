<?php

namespace App\Transformer;

/**
 * Class PostTransformer
 *
 * @package \App\Transformer
 */
class PostTransformer extends Transformer
{
    public function transform($post)
    {
//        return $post;

        return [
            'id'=>$post['id'],
            'project_id'=>$post['PROJECT_ID'],
            'stage_id'=>$post['PLAN_ID'],
            'sort_id'=>$post['BUSINESS_MATTER_ID'],
            'content'=>$post['PRO_PROGRESS'],
            'plan'=>$post['PRO_PLAN']
        ];
    }
}
