<?php

namespace Middlewares;

use Slim\Http\Request;
use Slim\Http\Response;

class IOMiddleware
{
    private $logger;

    /**
     * Construct
     * @param mixed $c Application context
     */
    public function __construct($c)
    {
        $this->logger = $c->get('logger');
    }

    /**
     * Function that will be call for all incomming request and log the relevant information
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return Response
     */
    public function __invoke(Request $request, Response $response, $next)
    {
        $response = $next($request, $response);

        $code = $response->getStatusCode();

        $context = [
            'method' => $request->getMethod(),
            'body' => $request->getParsedBody(),
            'headers' => $request->getHeaders()
        ];

        if ($code >= 200 && $code <= 202) {
            $this->logger->info($data, $context);
        } else if ($code >= 203 && $code<= 400) {
            $this->logger->warning($data, $context);
        } else {
            $this->logger->error($data, $context);
        }

        return $response;
    }
}