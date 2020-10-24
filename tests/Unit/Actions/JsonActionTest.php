<?php

namespace DarkMatter\Tests\Unit\Action;

use DarkMatter\Components\Logger\NullLogger;
use DarkMatter\Responder\JsonResponder;
use DarkMatter\Http\Request;
use DarkMatter\Tests\Fixtures\HelloWorldJsonAction;
use PHPUnit\Framework\TestCase;

class JsonActionTest extends TestCase
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
        $action = new HelloWorldJsonAction($this->config, $this->logger, $request);
        $this->assertInstanceOf(JsonResponder::class, $action->getResponder());
    }
}
