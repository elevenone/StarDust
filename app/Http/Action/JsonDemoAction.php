<?php

declare(strict_types=1);

namespace App\Http\Action;

use DarkMatter\Action\JsonAction;
use DarkMatter\Http\Response;

/**
 * Class JsonDemoAction
 *
 * This is an example of a JsonAction. In every action of this type you have access to the JsonResponder object
 * which can be used to send JSON encoded data back to the clint.
 *
 * @package App\Actions
 */
class JsonDemoAction extends JsonAction
{
    public function __invoke(array $arguments = []): Response
    {
        // At this point you would normally fetch some data from a domain or service:
        $customers = [
            [
                'id' => 1,
                'firstname' => 'Mikka',
                'lastname' => 'Makka',
            ],
            [
                'id' => 2,
                'firstname' => 'Zorro',
                'lastname' => 'Morro',
            ]
        ];

        // The data than automatically converted to JSON and send back to the client:
        return $this->responder->found($customers);
    }
}
