<?php

namespace  App\Repositories;

use App\Models\Banner;
use Prettus\Repository\Eloquent\BaseRepository;

class BannerRepository extends BaseRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return Banner::class;
    }
}
