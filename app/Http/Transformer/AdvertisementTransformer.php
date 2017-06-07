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
            'tags' => $advertisement->tags,
            'title' => $advertisement->title,
            'price' => $advertisement->price,
            'published' => $advertisement->published_at ? (string)$advertisement->published_at : null,
            'description' => $advertisement->description,
        ];
    }
}
