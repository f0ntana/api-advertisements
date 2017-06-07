<?php

namespace App\Http\Controllers\Auth;

use App\Advertisement\Service\User\CreateUserService;
use App\Http\Controllers\Controller;
use App\Http\Request\RegisterRequest;
use App\Http\Transformer\UserTransformer;

class RegisterController extends Controller
{
    /**
     * @var CreateUserService
     */
    private $service;

    /**
     * Create a new controller instance.
     * @param CreateUserService $service
     */
    public function __construct(CreateUserService $service)
    {
        $this->service = $service;
    }

    /**
     * @param RegisterRequest $request
     * @return \Spatie\Fractal\Fractal
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function register(RegisterRequest $request)
    {
        $user = $this->service->fire($request->all());

        return fractal($user, new UserTransformer);
    }
}
