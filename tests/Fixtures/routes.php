<?php

return [
    'home' => [
        'method' => 'GET',
        'pattern' => '/',
        'handler' => 'DarkMatter\Tests\Fixtures\HelloWorldHtmlAction',
    ],

    'invalid_action' => [
        'method' => 'GET',
        'pattern' => '/invalid-action',
        'handler' => 'DarkMatter\Tests\Fixtures\InvalidAction',
    ],
];
