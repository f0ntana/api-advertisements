<?php

namespace App\Providers;

use App\Advertisement\Contracts\UsersContract;
use App\Advertisement\Repository\UsersRepository;
use App\Models\User;
use App\Observer\UserObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
    }
}
