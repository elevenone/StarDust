<?php

declare(strict_types = 1);

namespace App\Domain;

use DarkMatter\Domain\Domain;

use DarkMatter\Payload\Payload;
use DarkMatter\Payload\Status;

// https://github.com/radarphp/Radar.Adr/blob/2.x/src/Responder/Responder.php

/**
 * Class HomeDomain
 *
 * This is a very simple domain which is normally used to provide some kind of data for you views.
 *
 * @package DarkMatterApp\Domains
 */
class HomeDomainPayloadTwo extends Domain
{
    public function __construct(array $id)
    {
        $this->id = $id['id'];
    }

    /**
     * Retrieves welcome text.
     *
     * @return string
     */
    public function getWelcomePayload() : Payload
    {
        // get the data from the db or filesystem
        $payload_dymmy_data = [
            'body'  => 'welcome to stardust / darkmatter',
            'extras' => [
                'message'  => 'welcome to stardust / darkmatter',
                'note'  => 'message from: ' . __CLASS__,
                'button' => '<a href="http://localhost:8000">index</a>',
                'button2' => '<a href="/payloadtest/">payloadtest</a>',
                'button3' => '<a href="/payloadtest/43545">payloadtest/43545</a>',
                'id' => $this->id
            ]
        ];

        // if we get the data or file or whatever, then set the payload STATUS to FOUND
        $payload = new Payload(Status::FOUND, $payload_dymmy_data);

        return $payload;
    }
}
