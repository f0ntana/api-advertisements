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
     * @param User $user
     * @param Advertisement $advertisement
     * @param array $params
     * @return mixed
     */
    public function update(User $user, Advertisement $advertisement, array $params);

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

    /**
     * @param User $user
     * @param string $uuid
     * @return Advertisement
     */
    public function getOwnerByUuid(User $user, $uuid);
}