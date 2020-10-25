<?php

declare(strict_types=1);

namespace App\Http\Action;

// framework
use DarkMatter\Http\Response;
use DarkMatter\Action\HtmlAction;

// application
use App\Domain\HomeDomainPayloadTwo;
use App\Http\PayloadResponder;

/**
 * Class HomeActionPayload
 *
 * This is an example of a HtmlAction. In every HtmlAction you have access to the HtmlResponder.
 *
 * @package DarkMatterApp\Actions
 */
class HomeActionPayloadTwo extends HtmlAction
{
    /**
     * @param array $arguments Possible arguments from the URL.
     * @return Response
     */
    public function __invoke(array $arguments = []) : Response
    {
        // default argument / when not specified from the route
        $id = 42324234234;

        // if (!empty($arguments['id'])) {}
        if (!isset($arguments['id'])) {
            $arguments['id'] = $id;
        }

        // new domain
        $domain = new HomeDomainPayloadTwo($arguments);
        $payload = $domain->getWelcomePayload($arguments['id']);

        // set route arguments for domain
        // $payload->setArguments($arguments['id']);

        // Set Payload responder
        $this->setResponder(new PayloadResponder($this->config));
        $responder = $this->responder->__invoke($payload);

        return $responder;
    }
}
