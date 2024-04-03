<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MockySMSProviderA implements SMSProviderInterface
{

    public function sendSMS($phoneNumber, $message)
    {
        /* The endpoint at https://run.mocky.io/v3/8eb88272-d769-417c-8c5c-159bb023ec0a is giving service unavailable
        * so i faked one instead
        */
        $response = Http::get('https://run.mocky.io/v3/8eb88272-d769-417c-8c5c-159bb023ec0a');
    }
}
