<?php
return [
    'gateway' => 'IpPanel', //available = Log, MeliPayamak, IpPanel
    'expire' => 120,
    'digits' => 5,
    'log' => [
        'file' => storage_path('logs/laravel.log')
    ],
    'melipayamak' => [
        'username' => 'your username',
        'password' => 'your password'
    ],
    'ippanel' => [
        'api_key' => 'your api key',
        'from' => 'send from'
    ],
    'patterns' => [
        'otp-code' => 'your otp code pattern'
    ]
];
