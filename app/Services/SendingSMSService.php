<?php

namespace App\Services;

class SendingSMSService
{
    /**
     * Create a new class instance.
     */
    public function __construct(public SMSProviderInterface $SMSProvider)
    {
        //
    }

    public function invoke($phone, $message)
    {
        $this->SMSProvider->sendSMS($phone, $message);
    }
}
