<?php

namespace App\Domain\Service\Advertisement;

use App\Domain\Contracts\AdvertisementsContract;
use App\Models\User;

class UpdateService
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
     * @param array $params
     * @return \App\Models\Advertisement
     */
    public function fire(User $user, $uuid, array $params)
    {
        $advertisement = $this->repository->getOwnerByUuid($user, $uuid);
        $this->repository->update($user, $advertisement, $params);

        return $advertisement;
    }
}
