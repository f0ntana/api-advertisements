<?php

namespace App\Domain\Repository\Eloquent;

use App\Domain\Contracts\PicturesContract;
use App\Models\Picture;

class PicturesRepository implements PicturesContract
{
    /**
     * @param $query
     * @return \Illuminate\Support\Collection
     */
    public function fetchAll($query)
    {
        return Picture::all();
    }

    /**
     * @param int $id
     * @return \App\Models\Picture
     */
    public function find($id)
    {
        return Picture::find($id);
    }

    /**
     * @param array $params
     * @return \App\Models\Picture
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function create(array $params)
    {
        $picture = (new Picture())->fill($params);
        $picture->save();

        return $picture;
    }

    /**
     * @param Picture $picture
     * @param array $params
     * @return \App\Models\Picture
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update(Picture $picture, array $params)
    {
        $picture->fill([
            'email' => $params['email'],
            'name' => $params['name']
        ]);

        $picture->save();

        return $picture;
    }

    /**
     * @param Picture $picture
     * @return \App\Models\Picture
     * @throws \Exception
     */
    public function delete(Picture $picture)
    {
        return $picture->delete();
    }
}