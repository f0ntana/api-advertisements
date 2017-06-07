<?php

namespace App\Advertisement\Contracts;

use App\Models\User;

interface UsersContract
{
    /**
     * @param array $params
     * @return User
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function create(array $params);

    /**
     * @param User $user
     * @param array $params
     * @return User
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update(User $user, array $params);

    /**
     * @param int $id
     * @return User
     */
    public function get($id);

    /**
     * @param string $email
     * @return User
     */
    public function getByEmail($email);

    /**
     * @param User $user
     * @return User
     * @throws \Exception
     */
    public function delete(User $user);
}