<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform($transformer)
    {
        $transformer = $transformer->toArray();

        return $transformer;
    }
}
