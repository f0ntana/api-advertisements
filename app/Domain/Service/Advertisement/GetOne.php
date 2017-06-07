<?php

namespace App\Domain\Service\Advertisement;

use App\Domain\Contracts\AdvertisementsContract;
use App\Models\User;

class GetOne
{
    /**
     * @var AdvertisementsContract
     */
    private $repository;

    /**
     * CreateService constructor.
     * @param AdvertisementsContract $repository
     */
    public function __construct(AdvertisementsContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param User $user
     * @param string $uuid
     * @return \App\Models\Advertisement
     */
    public function byUser(User $user, $uuid)
    {
        return $this->repository->getOwnerByUuid($user, $uuid);
    }
}
