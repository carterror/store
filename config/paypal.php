<?php

return [
    "client_id" => env('PAYPAL_API_CLIENTID'),
    "secret" => env('PAYPAL_API_SECRET'),
    "settings" => [
        "mode" => env('PAYPAL_MODE', 'sandbox')
    ]
];
