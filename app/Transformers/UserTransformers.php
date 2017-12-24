<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Repositories\GoodsRepository;

class UserTransformer extends TransformerAbstract
{

    public function transform($transformer)
    {
        $transformer = $transformer->toArray();

        unset($transformer['remember_token']);

        return $transformer;
    }


}
