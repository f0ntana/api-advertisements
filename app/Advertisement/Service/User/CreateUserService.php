<?php

namespace App\Advertisement\Service\User;

use App\Advertisement\Contracts\UsersContract;

class CreateUserService
{
    /**
     * @var UsersContract
     */
    private $repository;

    /**
     * CreateService constructor.
     * @param UsersContract $repository
     */
    public function __construct(UsersContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $params
     * @return \App\Models\User
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function fire(array $params)
    {
        $user = $this->repository->create($params);

        return $user;
    }
}
