<?php

return [
    /* ------------------------------------------------------------------------------------------------
     |  Settings driver
     | ------------------------------------------------------------------------------------------------
     |  Supported : 'json', 'database'
     */
    'default' => 'json',

    /* ------------------------------------------------------------------------------------------------
     |  Settings supported drivers
     | ------------------------------------------------------------------------------------------------
     */
    'stores' => [
        'json'     => [
            'path' => storage_path('app/settings.json'),
        ],

        'database' => [
            'connection' => null,
            'table'      => 'settings',
        ],
    ],
];
