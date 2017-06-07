<?php

namespace App\Advertisement\Service\User;

use App\Advertisement\Contracts\UsersContract;
use App\Models\User;

class UpdateUserService
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
     * @param User $user
     * @param array $params
     * @return User
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function fire(User $user, array $params)
    {
        $this->repository->update($user, $params);

        return $user;
    }
}
