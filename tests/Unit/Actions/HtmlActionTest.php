<?php

namespace DarkMatter\Tests\Unit\Action;

use DarkMatter\Components\Logger\NullLogger;
use DarkMatter\Responder\HtmlResponder;
use DarkMatter\Http\Request;
use DarkMatter\Tests\Fixtures\HelloWorldHtmlAction;
use PHPUnit\Framework\TestCase;

class HtmlActionTest extends TestCase
{
    public $config;

    public $logger;

    public function setUp(): void
    {
        $this->config = include SC_TESTS . '/Fixtures/config.php';
        $this->logger = new NullLogger;
    }

    public function testGetResponder()
    {
        $request = new Request;
        $action = new HelloWorldHtmlAction($this->config, $this->logger, $request);
        $this->assertInstanceOf(HtmlResponder::class, $action->getResponder());
    }
}
