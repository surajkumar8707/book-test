<?php

return [
    'admin' => [
        'prefix' => env('ADMIN_PREFIX', 'admin'),
        'roles' => [
            'admin' => 'admin'
        ]
    ],

    'user' => [
        'prefix' => env('USER_PREFIX', 'user'),
        'roles' => [
            'station_one' => 'station_one',
            'station_two' => 'station_two',
            'station_three' => 'station_three',
            'station_four' => 'station_four',
            'station_five' => 'station_five',
            'station_six' => 'station_six',
            'station_seven_a' => 'station_seven_a',
            'station_seven_b' => 'station_seven_b'
        ]
    ]
];