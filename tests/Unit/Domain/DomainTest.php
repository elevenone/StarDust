<?php

namespace DarkMatter\Tests\Unit\Domain;

use DarkMatter\Components\Logger\NullLogger;
use DarkMatter\Tests\Fixtures\DummyDomain;
use PHPUnit\Framework\TestCase;

class DomainTest extends TestCase
{
    public $config;

    public $logger;

    public function __invoke()
    {

    }

    public function setUp(): void
    {
        $this->config = include SC_TESTS . '/Fixtures/config.php';
        $this->logger = new NullLogger;
    }

    public function testDomainCanBeInitialized()
    {
        $domain = new DummyDomain($this->config, $this->logger);
        $this->assertInstanceOf('DarkMatter\Domain\Domain', $domain);
    }
}
