<?php

namespace App\Domain\Contracts;

use App\Models\User;

interface UsersContract
{

    /**
     * @param $query
     * @return \Illuminate\Support\Collection
     */
    public function fetchAll($query);

    /**
     * @param int $id
     * @return \App\Models\User
     */
    public function find($id);

    /**
     * @param array $params
     * @return \App\Models\User
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function create(array $params);

    /**
     * @param User $user
     * @param array $params
     * @return \App\Models\User
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update(User $user, array $params);

    /**
     * @param User $user
     * @return \App\Models\User
     * @throws \Exception
     */
    public function delete(User $user);
}