# stardust
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/elevenone/stardust/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/elevenone/stardust/?branch=main)
[![Build Status](https://scrutinizer-ci.com/g/elevenone/stardust/badges/build.png?b=main)](https://scrutinizer-ci.com/g/elevenone/stardust/build-status/main)
An Action-Domain-Responder project skeleton

stardust is a PSR-7-ish [Action-Domain-Responder](http://pmjones.io/adr) (ADR) system.

## Installing stardust

You will need [Composer](https://getcomposer.org) to install Radar.

Pick a project name, and use Composer to create it with Radar; here we create
one called `example-project`:

    composer create-project elevenone/stardust my-stardust-app-name

Confirm the installation by changing into the project directory and starting the
built-in PHP web server:

    cd example-project
    php ./bin/admin.php

You can then browse to <http://127.0.0.1:8080/>:

    {"phrase":"Hello world"}

## Documentation

LATER ... // You can read the documentation [here](docs/index.md).
