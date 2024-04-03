<?php

namespace App\Providers;

use App\Events\IntervalSubmited;
use App\Listeners\IntervalSubmitedListener;
use App\Services\MockySMSProviderA;
use App\Services\MockySMSProviderB;
use App\Services\SendingSMSService;
use App\Services\SMSProviderInterface;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
//        $this->app->bind(SMSProviderInterface::class, SendingSMSService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(IntervalSubmited::class, IntervalSubmitedListener::class);
    }
}
