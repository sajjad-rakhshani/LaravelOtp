<?php
return [
    'gateway' => 'IpPanel', //available = Log, MeliPayamak, IpPanel
    'expire' => 120,
    'digits' => 5,
    'log' => [
        'file' => storage_path('logs/laravel.log')
    ],
    'melipayamak' => [
        'username' => '09905593854',
        'password' => '137513941404@Aa'
    ],
    'ippanel' => [
        'api_key' => 'Ga1pirhLfrarTB4aY6PJF6HIJVenmaRVYM8PlfAN0VA=',
        'from' => '+983000505'
    ],
    'patterns' => [
        'otp-code' => '83oawq7hbl8g7pk'
    ]
];
