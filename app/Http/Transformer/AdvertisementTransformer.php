<?php

namespace App\Http\Transformer;

use App\Models\Advertisement;
use League\Fractal\TransformerAbstract;

class AdvertisementTransformer extends TransformerAbstract
{
    /**
     * @param Advertisement $advertisement
     * @return array
     */
    public function transform(Advertisement $advertisement)
    {
        return [
            'title' => $advertisement->name,
            'price' => $advertisement->email,
        ];
    }
}
