<?php

namespace App\Http\Controllers\Advertisement;

use App\Domain\Service\Advertisement\CreateService;
use App\Domain\Service\Advertisement\FetchAll;
use App\Http\Controllers\Controller;
use App\Http\Request\Advertisement\CreateRequest;
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
