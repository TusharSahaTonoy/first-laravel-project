<?php

return [
    'user' => [
        'model' => 'App\User',
        'foreignKey' => null,
        'ownerKey' => null
    ],
    'broadcast' => [
        'enable' => false,
        'app_name' => 'My-First-Porject',
        'pusher' => [
            'app_id'        => '',
            'app_key'       => 'base64:BC1DyFavDpfsx22b7Tx3sKjbeQwvJEcdOvBKP4TDGF8=',
            'app_secret'    => '',
            'options' => [
                 'cluster' => 'ap1',
                 'encrypted' => true
            ]
        ]
    ],
    'oembed' => [
        'enabled' => false,
        'url' => null,
        'key' => null
    ]
];
