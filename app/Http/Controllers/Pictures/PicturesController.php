<?php

namespace App\Http\Controllers\Pictures;

use App\Domain\Service\PictureService;
use App\Http\Controllers\Controller;
use App\Http\Request\Picture\CreateRequest;
use App\Http\Request\Picture\UpdateRequest;
use App\Http\Transformer\PictureTransformer;
use Illuminate\Http\Request;

class PicturesController extends Controller
{
    /**
     * @var PictureService
     */
    private $pictures;

    /**
     * PicturesController constructor.
     * @param PictureService $pictures
     */
    public function __construct(PictureService $pictures)
    {
        $this->pictures = $pictures;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pictures = $this->pictures->fetchAllByUser($request->user());

        return fractal($pictures, new PictureTransformer);
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
        $picture = $this->pictures->create($request->user(), $request->all());

        return fractal($picture, new PictureTransformer);
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
        $picture = $this->pictures->getByUser($request->user(), $id);

        return fractal($picture, new PictureTransformer);
    }

    /**
     * @param UpdateRequest $request
     * @param $id
     * @return \Spatie\Fractal\Fractal
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update(UpdateRequest $request, $id)
    {
        $picture = $this->pictures->update($request->user(), $id, $request->all());

        return fractal($picture, new PictureTransformer);
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
        $picture = $this->pictures->delete($request->user(), $id);

        return fractal($picture, new PictureTransformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function publish(Request $request, $id)
    {
        $picture = $this->pictures->togglePublished($request->user(), $id);

        return fractal($picture, new PictureTransformer);
    }
}
