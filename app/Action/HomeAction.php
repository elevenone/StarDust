<?php

declare(strict_types=1);

namespace App\Action;

use DarkMatter\Action\HtmlAction;
use DarkMatter\Http\Response;
use App\Domain\HomeDomain;

/**
 * Class HomeAction
 *
 * This is an example of a HtmlAction. In every HtmlAction you have access to the HtmlResponder.
 *
 * @package Bloatless\EndocoreApp\Actions
 */
class HomeAction extends HtmlAction
{
    /**
     * Every Action needs to have a "__invoke" methods which is automatically executed by the application.
     * This methods needs to return the response which will than be send to the client.
     *
     * @param array $arguments Possible arguments from the URL.
     * @return Response
     */
    public function __invoke(array $arguments = []): Response
    {
        // Fetch some data from a domain:
        $domain = new HomeDomain;
        $data = [
            'body' => $domain->getWelcomeText(),
        ];

        return $this->responder->found($data);
    }
}
