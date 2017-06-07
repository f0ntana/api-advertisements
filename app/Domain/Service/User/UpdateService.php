<?php

namespace App\Domain\Service\User;

use App\Domain\Contracts\UsersContract;
use App\Models\User;

class UpdateService
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
