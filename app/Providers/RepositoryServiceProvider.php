<?php

namespace App\Providers;

use App\Advertisement\Contracts\UsersContract;
use App\Advertisement\Repository\UsersRepository;
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
    }
}
