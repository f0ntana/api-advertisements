<?php

namespace App\Http\Controllers\Advertisement;

use App\Domain\Service\AdvertisementService;
use App\Http\Controllers\Controller;
use App\Http\Request\Advertisement\CreateRequest;
use App\Http\Request\Advertisement\UpdateRequest;
use App\Http\Transformer\AdvertisementTransformer;
use Illuminate\Http\Request;

class AdvertisementsController extends Controller
{
    /**
     * @var AdvertisementService
     */
    private $advertisements;

    /**
     * AdvertisementsController constructor.
     * @param AdvertisementService $advertisements
     */
    public function __construct(AdvertisementService $advertisements)
    {
        $this->advertisements = $advertisements;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $advertisements = $this->advertisements->fetchAllByUser($request->user());

        return fractal($advertisements, new AdvertisementTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function store(CreateRequest $request)
    {
        $advertisement = $this->advertisements->create($request->user(), $request->all());

        return fractal($advertisement, new AdvertisementTransformer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $advertisement = $this->advertisements->getByUser($request->user(), $id);

        return fractal($advertisement, new AdvertisementTransformer);
    }

    /**
     * @param UpdateRequest $request
     * @param $id
     * @return \Spatie\Fractal\Fractal
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update(UpdateRequest $request, $id)
    {
        $advertisement = $this->advertisements->update($request->user(), $id, $request->all());

        return fractal($advertisement, new AdvertisementTransformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, $id)
    {
        $advertisement = $this->advertisements->delete($request->user(), $id);

        return fractal($advertisement, new AdvertisementTransformer);
    }
}
