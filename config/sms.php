<?php

return [
    'default' => env('SMS_PROVIDER', 'mockyA'),
    'providers' => [
        'mockyA' => App\Services\MockySMSProviderA::class,
        'mockyB' => App\Services\MockySMSProviderB::class,
        // Add more providers here
    ]
];
