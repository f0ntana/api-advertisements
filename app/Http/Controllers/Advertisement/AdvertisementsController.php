<?php

namespace App\Http\Controllers\Advertisement;

use App\Domain\Service\Advertisement\CreateService;
use App\Domain\Service\Advertisement\Delete;
use App\Domain\Service\Advertisement\FetchAll;
use App\Domain\Service\Advertisement\GetOne;
use App\Domain\Service\Advertisement\UpdateService;
use App\Http\Controllers\Controller;
use App\Http\Request\Advertisement\CreateRequest;
use App\Http\Request\Advertisement\UpdateRequest;
use App\Http\Transformer\AdvertisementTransformer;
use Illuminate\Http\Request;

class AdvertisementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param FetchAll $fetchAll
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, FetchAll $fetchAll)
    {
        $advertisements = $fetchAll->byUser($request->user());

        return fractal($advertisements, new AdvertisementTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @param CreateService $service
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function store(CreateRequest $request, CreateService $service)
    {
        $advertisement = $service->fire($request->user(), $request->all());

        return fractal($advertisement, new AdvertisementTransformer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param GetOne $getOne
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show($id, GetOne $getOne, Request $request)
    {
        $advertisement = $getOne->byUser($request->user(), $id);

        return fractal($advertisement, new AdvertisementTransformer);
    }

    /**
     * @param UpdateRequest $request
     * @param UpdateService $service
     * @param $id
     * @return \Spatie\Fractal\Fractal
     */
    public function update(UpdateRequest $request, UpdateService $service, $id)
    {
        $advertisement = $service->fire($request->user(), $id, $request->all());

        return fractal($advertisement, new AdvertisementTransformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Delete $delete
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Delete $delete, $id)
    {
        $advertisement = $delete->fire($request->user(), $id);

        return fractal($advertisement, new AdvertisementTransformer);
    }
}
