<?php

namespace App\Domain\Service\Advertisement;

use App\Domain\Contracts\AdvertisementsContract;
use App\Models\User;

class CreateService
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
     * @param array $params
     * @return \App\Models\Advertisement
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function fire(User $user, array $params)
    {
        $advertisement = $this->repository->create($user, $params);

        return $advertisement;
    }
}
