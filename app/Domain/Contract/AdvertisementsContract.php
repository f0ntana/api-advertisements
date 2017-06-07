<?php

namespace App\Domain\Contracts;

use App\Models\Advertisement;
use App\Models\User;

interface AdvertisementsContract
{
    /**
     * @param User $user
     * @param array $params
     * @return Advertisement
     */
    public function create(User $user, array $params);

    /**
     * @param Advertisement $advertisement
     * @param array $params
     * @return Advertisement
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update(Advertisement $advertisement, array $params);

    /**
     * @param int $id
     * @return Advertisement
     */
    public function get($id);

    /**
     * @param Advertisement $advertisement
     * @return Advertisement
     * @throws \Exception
     */
    public function delete(Advertisement $advertisement);

    /**
     * @param User $user
     * @return Advertisement
     */
    public function fetchOwner(User $user);
}