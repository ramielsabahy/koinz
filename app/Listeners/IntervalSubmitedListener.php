<?php

namespace App\Listeners;

use App\Events\IntervalSubmited;
use App\Services\IncrementIntervalService;
use App\Services\SMSProviderInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class IntervalSubmitedListener implements ShouldQueue
{
    public function __construct(public SMSProviderInterface $smsProvider, public IncrementIntervalService $intervalService) {

    }

    /**
     * Handle the event.
     */
    public function handle(IntervalSubmited $event): void
    {
        Log::debug("SMS sent");
        $this->smsProvider->sendSMS($event->phone, "Message");
    }
}
