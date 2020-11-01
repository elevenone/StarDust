<?php

declare(strict_types = 1);

namespace App\Http;

use DarkMatter\Http\Response;
use DarkMatter\Payload\Payload;
use DarkMatter\Payload\Status;
use DarkMatter\Responder\HtmlResponder;
use DarkMatter\Components\PhtmlRenderer\Factory as RendererFactory;

/**
 * @property string $view
 */

class PayloadResponder extends HtmlResponder
{
    /**
     * @var \DarkMatter\Components\PhtmlRenderer\PhtmlRenderer $renderer
     */
    protected $renderer;

    public function __construct(array $config)
    {
        $this->renderer = (new RendererFactory($config))->makeRenderer();
        parent::__construct($config);
    }

    /**
     * Generates a payload response.
     *
     * @param Payload $payload
     * @return Response
     */
    public function __invoke(Payload $payload): Response
    {
        $body = $this->renderer->render('logs', [
            'logs' => $data['logs'] ?? [],
            'sources' => $data['sources'] ?? [],
            'levels' => $data['levels'] ?? [],
            'filters' => $data['filters'] ?? []
        ]);

        ///return $this->found(['body' => $body]);
//exit;
        // payload
        $payloadResult = $payload->getResult();

        if ($payload->getStatus() === Status::FOUND) {
            return $this->found($payloadResult);
        }

        return $this->error([$payloadResult['error'] ?? 'Unknown Error']);
    }

    /**
     * Respond with an not found message.
     *
     * @return Response
     */
    public function notFound(): Response
    {
        echo 'own notfound method';
        exit;
        $this->response->setStatus(404);
        $this->response->setBody('<html><title>404 Not found</title>404 Not found</html>');
        return $this->response;
    }






}
