<?php

declare(strict_types = 1);

namespace App\Domain;

/**
 * Class HomeDomain
 *
 * This is a very simple domain which is normally used to provide some kind of data for you views.
 *
 * @package App\Domains
 */
class HomeDomain
{
    /**
     * Retrieves welcome text.
     *
     * @return string
     */
    public function getWelcomeText(): string
    {
        $welcomeText = '
            <p>Hello World!<br>This is Stardust...</p>
            <hr>
            <br/>
            <a href="/">index</a>
            <br/>
            <a href="payload/">payload</a>
            <br/>
            <a href="payload/42">payload/42</a>
            <br/>
            <a href="payloadtwo/">payloadtwo/</a>
            <br/>
            <a href="payloadtwo/42">payloadtwo/42</a>
            <br/>
        ';
        return $welcomeText;
    }
}
