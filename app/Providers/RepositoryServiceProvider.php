<?php

namespace App\Providers;

use App\Domain\Contracts\AdvertisementsContract;
use App\Domain\Contracts\PicturesContract;
use App\Domain\Contracts\UsersContract;
use App\Domain\Repository\Eloquent\AdvertisementsRepository;
use App\Domain\Repository\Eloquent\PicturesRepository;
use App\Domain\Repository\Eloquent\UsersRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UsersContract::class, UsersRepository::class);
        $this->app->bind(AdvertisementsContract::class, AdvertisementsRepository::class);
        $this->app->bind(PicturesContract::class, PicturesRepository::class);
    }
}
