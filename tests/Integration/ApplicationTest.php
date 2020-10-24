<?php

namespace DarkMatter\Tests\Integration;

use DarkMatter\Application;
use DarkMatter\Components\Logger\Factory as LoggerFactory;
use DarkMatter\Exception\ExceptionHandler;
use DarkMatter\Http\Request;
use DarkMatter\Components\Router\Router;
use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{
    public $config;

    public $routes;

    public $logger;

    public $exceptionHandler;

    public function setUp(): void
    {
        $this->config = include SC_TESTS . '/Fixtures/config.php';
        $this->routes = include SC_TESTS . '/Fixtures/routes.php';
        $loggerFactory = new LoggerFactory($this->config);
        $this->logger = $loggerFactory->makeNullLogger();
        $request = new Request;
        $this->exceptionHandler = new ExceptionHandler($this->config, $this->logger, $request);
    }

    public function testApplicationCanBeInitiated()
    {
        $request = new Request;
        $router = new Router($this->routes);
        $app = new Application(
            $this->config,
            $request,
            $router,
            $this->logger,
            $this->exceptionHandler
        );
        $this->assertInstanceOf('DarkMatter\Application', $app);
        $this->assertInstanceOf('DarkMatter\Http\Request', $app->request);
        $this->assertInstanceOf('DarkMatter\Components\Router\RouterInterface', $app->router);
        $this->assertInstanceOf('DarkMatter\Components\Logger\LoggerInterface', $app->logger);
        $this->assertInstanceOf('DarkMatter\Exception\ExceptionHandler', $app->exceptionHandler);
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testValidRoute()
    {
        $request = new Request([], [], [
           'REQUEST_METHOD' => 'GET',
           'REQUEST_URI' => '/'
        ]);
        $router = new Router($this->routes);
        $app = new Application($this->config, $request, $router, $this->logger, $this->exceptionHandler);
        $this->expectOutputString('Hello World!');
        $response = $app->run();
        $this->assertEquals('Hello World!', $response->getBody());
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testNotFoundRoute()
    {
        $request = new Request([], [], [
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI' => '/qwertz'
        ]);
        $router = new Router($this->routes);
        $app = new Application($this->config, $request, $router, $this->logger, $this->exceptionHandler);
        $this->expectOutputRegex('/not found/i');
        $response = $app->run();
        $this->assertEquals(404, $response->getStatus());
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testMethodNotAllowedRequest()
    {
        $request = new Request([], [], [
            'REQUEST_METHOD' => 'POST',
            'REQUEST_URI' => '/'
        ]);
        $router = new Router($this->routes);
        $app = new Application($this->config, $request, $router, $this->logger, $this->exceptionHandler);
        $this->expectOutputRegex('/method not allowed/i');
        $response = $app->run();
        $this->assertEquals(405, $response->getStatus());
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testInvalidActionRequest()
    {
        $request = new Request([], [], [
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI' => '/invalid-action'
        ]);
        $router = new Router($this->routes);
        $app = new Application($this->config, $request, $router, $this->logger, $this->exceptionHandler);
        $this->expectOutputRegex('/Action class not found/i');
        $response = $app->run();
        $this->assertEquals(500, $response->getStatus());
    }
}
