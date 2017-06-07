<?php

namespace App\Providers;

use App\Models\Advertisement;
use App\Models\User;
use App\Observer\AdvertisementObserver;
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
        Advertisement::observe(AdvertisementObserver::class);
    }
}
