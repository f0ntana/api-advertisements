<?php

namespace App\Advertisement\Repository;

use App\Advertisement\Contracts\UsersContract;
use App\Models\User;

class UsersRepository implements UsersContract
{
    /**
     * @param array $params
     * @return User
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function create(array $params)
    {
        $user = (new User())->fill($params);
        $user->save();

        return $user;
    }

    /**
     * @param User $user
     * @param array $params
     * @return User
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update(User $user, array $params)
    {
        $user->fill([
            'email' => $params['email'],
            'name' => $params['name'],
        ]);

        $user->save();

        return $user;
    }

    /**
     * @param int $id
     * @return User
     */
    public function get($id)
    {
        return User::find($id);
    }

    /**
     * @param string $email
     * @return User
     */
    public function getByEmail($email)
    {
        return User::whereEmail($email)->first();
    }

    /**
     * @param User $user
     * @return User
     * @throws \Exception
     */
    public function delete(User $user)
    {
        return $user->delete();
    }
}