<?php

namespace App\Http\Controllers\Auth;

use App\Advertisement\Service\User\UpdateUserService;
use App\Http\Controllers\Controller;
use App\Http\Request\MeRequest;
use App\Http\Transformer\UserTransformer;

class UserController extends Controller
{
    /**
     * @var UpdateUserService
     */
    private $service;

    /**
     * Create a new controller instance.
     * @param UpdateUserService $service
     */
    public function __construct(UpdateUserService $service)
    {
        $this->service = $service;
    }

    /**
     * @param MeRequest $request
     * @return \Spatie\Fractal\Fractal
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update(MeRequest $request)
    {
        $this->service->fire($request->user(), $request->all());

        return fractal($request->user(), new UserTransformer);
    }
}
