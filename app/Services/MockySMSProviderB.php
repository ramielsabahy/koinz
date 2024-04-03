<?php

namespace App\Services;

class MockySMSProviderB implements SMSProviderInterface {

    public function sendSMS($phoneNumber, $message)
    {
        // Send SMS using mock API A
    }
}
