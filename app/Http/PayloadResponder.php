<?php

declare(strict_types=1);

namespace App\Http;

use DarkMatter\Http\Response;
use DarkMatter\Payload\Payload;
use DarkMatter\Payload\Status;

use DarkMatter\Responder\HtmlResponder;


/**
 * @property string $view
 */

class PayloadResponder extends HtmlResponder
{
    /**
     * Generates a payload response.
     *
     * @param Payload $payload
     * @return Response
     */
    public function __invoke(Payload $payload): Response
    {
        $payloadResult = $payload->getResult();

        if ($payload->getStatus() === Status::FOUND) {
            return $this->found($payloadResult);
        }

        return $this->error([$payloadResult['error'] ?? 'Unknown Error']);
    }








}
