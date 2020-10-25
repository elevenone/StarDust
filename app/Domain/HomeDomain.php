<?php

declare(strict_types=1);

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
        $welcomeText = '<p>Hello World!<br>This is Stardust...</p>';
        return $welcomeText;
    }
}
