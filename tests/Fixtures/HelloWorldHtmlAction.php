<?php

namespace DarkMatter\Tests\Fixtures;

use DarkMatter\Action\HtmlAction;
use DarkMatter\Http\Response;

class HelloWorldHtmlAction extends HtmlAction
{
    public function __invoke(array $arguments = []): Response
    {
        return new Response(200, [], 'Hello World!');
    }
}
