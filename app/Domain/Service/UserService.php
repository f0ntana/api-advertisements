<?php

namespace App\Domain\Service;

use App\Domain\Contracts\UsersContract;

class UserService
{
    /**
     * @var UsersContract
     */
    private $repository;

    /**
     * UserService constructor.
     * @param UsersContract $repository
     */
    public function __construct(UsersContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $query
     * @return \Illuminate\Support\Collection
     */
    public function fetchAll($query)
    {
        return $this->repository->fetchAll($query);
    }

    /**
     * @param int $id
     * @return \App\Models\User
     */
    public function get($id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param array $params
     * @return \App\Models\User
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function create(array $params)
    {
        return $this->repository->create($params);
    }

    /**
     * @param int $id
     * @param array $params
     * @return \App\Models\User
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update($id, array $params)
    {
        $user = $this->get($id);
        $this->repository->update($user, $params);

        return $user;
    }

    /**
     * @param string $id
     * @return \App\Models\User
     * @throws \Exception
     */
    public function delete($id)
    {
        $user = $this->get($id);
        $this->repository->delete($user);

        return $user;
    }
}
