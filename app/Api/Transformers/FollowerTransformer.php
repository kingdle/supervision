<?php

namespace App\Api\Transformers;
use App\Models\Follower;
use League\Fractal\TransformerAbstract;

/**
 * Class SortTransformer
 *
 * @package \App\Api\Transformer
 */
class FollowerTransformer extends TransformerAbstract
{
    public function transform(Follower $follower){
        return [
            'id'=>$follower['id'],
            'follower_id'=>$follower['follower_id'],//关注人
            'followed_id'=>$follower['followed_id'],//关注任务
            'created_at'=>$follower['created_at'],//
            'updated_at'=>$follower['updated_at'],//
        ];
    }
}
