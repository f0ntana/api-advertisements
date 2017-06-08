<?php

namespace App\Http\Routes;

use Illuminate\Contracts\Routing\Registrar as Router;

class Advertisements
{
    /**
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->group(['middleware' => 'auth:api'], function (Router $router) {
            $router->resource('advertisements', 'AdvertisementsController', ['except' => ['create', 'edit']]);
            $router->post('advertisements/{uuid}/toggle-published', 'AdvertisementsController@publish');
        });

        $router->get('search', 'AdvertisementsController@search');
    }
}
