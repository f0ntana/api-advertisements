<?php

namespace App\Domain\Repository\Eloquent;

use App\Domain\Contracts\AdvertisementsContract;
use App\Models\Advertisement;
use App\Models\User;
use Carbon\Carbon;

class AdvertisementsRepository implements AdvertisementsContract
{
    /**
     * @param $query
     * @return \Illuminate\Support\Collection
     */
    public function fetchAll($query)
    {
        return Advertisement::all();
    }

    /**
     * @param User $user
     * @return \Illuminate\Support\Collection
     */
    public function fetchAllByUser(User $user)
    {
        return $user->advertisements;
    }

    /**
     * @param string $uuid
     * @return Advertisement
     */
    public function find($uuid)
    {
        return Advertisement::whereUuid($uuid)->first();
    }

    /**
     * @param User $user
     * @param string $uuid
     * @return Advertisement
     */
    public function findByUser($user, $uuid)
    {
        return $user->advertisements()->whereUuid($uuid)->first();
    }

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
        $advertisement->fill($params);
        $advertisement->save();

        return $advertisement;
    }

    /**
     * @param User $user
     * @param Advertisement $advertisement
     * @param array $params
     * @return Advertisement
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function updateByUser(User $user, Advertisement $advertisement, array $params)
    {
        $user->advertisements()->save($advertisement->fill($params));

        return $advertisement;
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
     * @param Advertisement $advertisement
     * @return Advertisement
     * @throws \Exception
     */
    public function togglePublished(User $user, Advertisement $advertisement)
    {
        $advertisement->published_at = $advertisement->published_at ? null : Carbon::now();
        $user->advertisements()->save($advertisement);

        return $advertisement;
    }
}
