<?php

namespace App\Http\Transformer;

use App\Models\Picture;
use League\Fractal\TransformerAbstract;

class PictureTransformer extends TransformerAbstract
{
    /**
     * @param Picture $picture
     * @return array
     */
    public function transform(Picture $picture)
    {
        return [$picture->file];
    }
}
