<?php

declare(strict_types=1);

namespace App\Http\Action;

// framework
use DarkMatter\Action\HtmlAction;
use DarkMatter\Http\Response;

// application
use App\Domain\HomeDomainPayload;
use App\Http\PayloadResponder;

/**
 * Class HomeActionPayload
 *
 * This is an example of a HtmlAction. In every HtmlAction you have access to the HtmlResponder.
 *
 * @package DarkMatterApp\Actions
 */
class HomeActionPayload extends HtmlAction
{
    /**
     * Every Action needs to have a "__invoke" methods which is automatically executed by the application.
     * 1. The Action asks data from the Domain, which returns a Payload with the Payload Status
     * 2. This methods needs to return the response with the Payload which will than be send to the client.
     * 3. The Responder sets the Respomse
     * 
     * https://github.com/pmjones/adr-example/blob/master/src/Web/Blog/Read/BlogReadAction.php
     * PAYLOAD = domain result              // DOMAIN sets the payload and STATUS
     * retuns responder to                  // return $this->responder->__invoke($request, $payload);
     *
     * @param array $arguments Possible arguments from the URL.
     * @return Response
     */
    public function __invoke(array $arguments = []) : Response
    {
        // 0 get argument from request | route config: '/payloadtest/[{id:\d+}]', 
        // 1 new domain with route args
        // 2 get data from domain with route args
        // 3 call responder with payload from domain

        if (!isset($arguments['id'])) {
            $arguments['id'] = 42;
        }

        //
        $domain = new HomeDomainPayload($arguments);
        $payload = $domain->getWelcomePayload();

        // html responder
        // $responder = $this->responder->payload($payload);

        // Set Payload responder
        $this->setResponder(new PayloadResponder($this->config));
        $responder = $this->responder->__invoke($payload);

        return $responder;
    }
}
