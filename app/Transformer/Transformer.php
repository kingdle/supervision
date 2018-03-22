<?php

namespace App\Transformer;

/**
 * Class Transformer
 *
 * @package \App\Transformer
 */
abstract class Transformer
{
    public function transformCollcetion($items)
    {
        return array_map([$this,'transform'],$items);
    }
    public abstract function transform($items);
}
