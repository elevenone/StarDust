# stardust
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
    php -S localhost:8080 -t public/

You can then browse to <http://localhost:8080/>:

    {"phrase":"Hello world"}

## Documentation

LATER ... // You can read the documentation [here](docs/index.md).
