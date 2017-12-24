<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class UserTransformers extends TransformerAbstract
{
    public function transform($transformer)
    {
        $transformer = $transformer->toArray();

        unset($transformer['remember_token']);

        return $transformer;
    }
}
