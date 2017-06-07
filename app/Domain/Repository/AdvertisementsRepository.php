<?php

namespace App\Domain\Repository;

use App\Domain\Contracts\AdvertisementsContract;
use App\Models\Advertisement;
use App\Models\User;

class AdvertisementsRepository implements AdvertisementsContract
{
    /**
     * @param User $user
     * @param array $params
     * @return Advertisement
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function create(User $user, array $params)
    {
        $advertisement = (new Advertisement())->fill($params);
        $user->advertisements()->save($advertisement);

        return $advertisement;
    }

    /**
     * @param Advertisement $advertisement
     * @param array $params
     * @return Advertisement
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update(Advertisement $advertisement, array $params)
    {
        $advertisement->fill([
            'email' => $params['email'],
            'name' => $params['name'],
        ]);

        $advertisement->save();

        return $advertisement;
    }

    /**
     * @param int $id
     * @return Advertisement
     */
    public function get($id)
    {
        return Advertisement::find($id);
    }

    /**
     * @param Advertisement $advertisement
     * @return Advertisement
     * @throws \Exception
     */
    public function delete(Advertisement $advertisement)
    {
        return $advertisement->delete();
    }

    /**
     * @param User $user
     * @return Advertisement
     */
    public function fetchOwner(User $user)
    {
        return $user->advertisements;
    }

    /**
     * @param User $user
     * @param string $uuid
     * @return Advertisement
     */
    public function getOwnerByUuid(User $user, $uuid)
    {
        return $user->advertisements()->whereUuid($uuid)->first();
    }
}
