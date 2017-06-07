<?php

namespace App\Domain\Service\Advertisement;

use App\Domain\Contracts\AdvertisementsContract;
use App\Models\User;

class Delete
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
     * @throws \Exception
     */
    public function fire(User $user, $uuid)
    {
        $advertisement = $this->repository->getOwnerByUuid($user, $uuid);
        $this->repository->delete($advertisement);

        return $advertisement;
    }
}
