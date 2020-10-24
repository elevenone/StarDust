<?php
/**
 * This is were you define all your applications routes. Every route needs an action as a handler.
 * The corresponding actions can be found in the "app/Actions" folder.
 */
return [
    // A GET route for the path "/" (your homepage).
    'home' => [
        'method' => 'GET',
        'pattern' => '/',
        'handler' => 'App\Action\HomeAction'
    ],

    // Another GET route (Path: /json-demo)
    'json' => [
        'method' => 'GET',
        'pattern' => '/json-demo',
        'handler' => 'App\Action\JsonDemoAction'
    ]
];