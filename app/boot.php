<?php
/**
 * launch script
 */
declare(strict_types=1);

use DarkMatter\Components\Logger\Factory as LoggerFactory;
use DarkMatter\Http\Request;
use DarkMatter\Components\Router;
use DarkMatter\Exception\ExceptionHandler;
use DarkMatter\Exception\Application\EndocoreException;
use DarkMatter\Application as Application;


try {
    // include config files:
    $config = require_once __DIR__ . '/config/config.php';
    $routes = require_once __DIR__ . '/config/routes.php';

    // init dependencies:
    $loggerFactory = new LoggerFactory($config);
    $request = new Request($_GET, $_POST, $_SERVER);
    $router = new Router\Router($routes);
    $logger = $loggerFactory->makeFileLogger();
    $exceptionHandler = new ExceptionHandler($config, $logger, $request);

    // create application:
    $app = new Application(
        $config,
        $request,
        $router,
        $logger,
        $exceptionHandler
    );

    // return $app;
    } catch (EndocoreException $e) {
        exit(sprintf('Error: %s (%s:%d)', $e->getMessage(), $e->getFile(), $e->getLine()));
    } catch (\Exception $e) {
        exit(sprintf('Error: %s (%s:%d)', $e->getMessage(), $e->getFile(), $e->getLine()));
    } catch (\Error $e) {
        exit(sprintf('Error: %s (%s:%d)', $e->getMessage(), $e->getFile(), $e->getLine()));
    }

$app->run();
