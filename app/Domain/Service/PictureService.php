<?php

namespace App\Domain\Service;

use App\Domain\Contracts\PicturesContract;
use App\Models\Advertisement;
use Illuminate\Http\UploadedFile;
use Ramsey\Uuid\Uuid;

class PictureService
{
    /**
     * @var PicturesContract
     */
    private $repository;

    /**
     * @var string
     */
    private $folder = 'app/public';

    /**
     * PictureService constructor.
     * @param PicturesContract $repository
     */
    public function __construct(PicturesContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Advertisement $advertisement
     * @return \Illuminate\Support\Collection
     * @internal param $query
     */
    public function fetchAll(Advertisement $advertisement)
    {
        return $this->repository->fetchAllByAdvertisement($advertisement);
    }

    /**
     * @param Advertisement $advertisement
     * @param int $name
     * @return \App\Models\Picture
     */
    public function get(Advertisement $advertisement, $name)
    {
        return $this->repository->find($advertisement, $name);
    }

    /**
     * @param Advertisement $advertisement
     * @param UploadedFile $file
     * @return \App\Models\Picture
     * @throws \Symfony\Component\HttpFoundation\File\Exception\FileException
     */
    public function create(Advertisement $advertisement, UploadedFile $file)
    {
        $filename = Uuid::uuid4() . '.' . $file->getClientOriginalExtension();
        $path = storage_path($this->folder);

        if ($file->move($path, $filename)) {
            return $this->repository->create($advertisement, [
                'file' => $filename,
                'active' => true,
            ]);
        }

        return false;
    }

    /**
     * @param Advertisement $advertisement
     * @param string $name
     * @return \App\Models\Picture
     */
    public function delete(Advertisement $advertisement, $name)
    {
        $picture = $this->get($advertisement, $name);
        $this->repository->delete($picture);

        return $picture;
    }
}
