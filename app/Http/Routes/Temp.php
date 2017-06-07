<?php

namespace App\Http\Routes;

use GuzzleHttp\Client;
use Illuminate\Contracts\Routing\Registrar as Router;

class Temp
{
    /**
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->get('temp', function () {
            $client = new Client([
                'base_uri' => 'http://advertisement.homestead.app/',
                'headers' => [
                    'Authorization' => 'Bearer mkoX3w5rxbHe8sGmHEaE8H5vNwamaGPRV71z89JDsgtbQX2jfWv0NBKGiqXr'
                ]
            ]);

            $response = $client->post('/advertisements/b18abcba-4bb3-11e7-96ef-08002732ed09/pictures', [
                'multipart' => [
                    [
                        'name'     => 'file',
                        'contents' => file_get_contents(storage_path('app/212d0dbc2355942f5717e7f4dabfe68d.jpg')),
                        'filename' => 'aaaaaaa.jpg'
                    ]
                ],
            ]);

            echo $response->getBody()->getContents();
        });
    }
}
