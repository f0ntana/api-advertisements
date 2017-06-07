<?php

namespace App\Http\Routes;

use Illuminate\Contracts\Routing\Registrar as Router;

class Advertisement
{
    /**
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->group(['middleware' => 'auth:api'], function (Router $router) {
            $router->resource('advertisements', 'AdvertisementsController', ['except' => ['create', 'edit']]);
        });
    }
}
