<?php

namespace App\Services;

interface SMSProviderInterface
{
    public function sendSMS($phoneNumber, $message);
}
