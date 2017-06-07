<?php

namespace App\Domain\Contracts;

use App\Models\Picture;

interface PicturesContract
{
    /**
     * @param $query
     * @return \Illuminate\Support\Collection
     */
    public function fetchAll($query);

    /**
     * @param int $id
     * @return \App\Models\Picture
     */
    public function find($id);

    /**
     * @param array $params
     * @return \App\Models\Picture
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function create(array $params);

    /**
     * @param Picture $picture
     * @param array $params
     * @return \App\Models\Picture
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update(Picture $picture, array $params);

    /**
     * @param Picture $picture
     * @return \App\Models\Picture
     * @throws \Exception
     */
    public function delete(Picture $picture);
}