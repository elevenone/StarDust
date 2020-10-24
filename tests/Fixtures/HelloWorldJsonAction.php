<?php

namespace DarkMatter\Tests\Fixtures;

use DarkMatter\Action\JsonAction;
use DarkMatter\Http\Response;

class HelloWorldJsonAction extends JsonAction
{
    public function __invoke(array $arguments = []): Response
    {
        return new Response(200, [], 'Hello World!');
    }
}
