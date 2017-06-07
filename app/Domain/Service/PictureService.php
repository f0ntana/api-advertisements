<?php

namespace App\Domain\Service;

use App\Domain\Contracts\PicturesContract;

class PictureService
{
    /**
     * @var PicturesContract
     */
    private $repository;

    /**
     * PictureService constructor.
     * @param PicturesContract $repository
     */
    public function __construct(PicturesContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $query
     * @return \Illuminate\Support\Collection
     */
    public function fetchAll($query)
    {
        return $this->repository->fetchAll($query);
    }

    /**
     * @param int $id
     * @return \App\Models\Picture
     */
    public function get($id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param array $params
     * @return \App\Models\Picture
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function create(array $params)
    {
        return $this->repository->create($params);
    }

    /**
     * @param Picture $picture
     * @param array $params
     * @return \App\Models\Picture
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update(Picture $picture, array $params)
    {
        $this->repository->update($picture, $params);

        return $picture;
    }

    /**
     * @param string $id
     * @return \App\Models\Picture
     * @throws \Exception
     */
    public function delete($id)
    {
        $picture = $this->get($id);
        $this->repository->delete($picture);

        return $picture;
    }
}
