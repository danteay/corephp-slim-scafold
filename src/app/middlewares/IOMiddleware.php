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
        $data = json_encode($request->getParsedBody());
        $data = empty($data) ? '' : $data;

        $starttime = microtime(true);
        $response = $next($request, $response);
        $endtime = microtime(true);
        $time = $endtime - $starttime;

        $context = [
            'code' => $response->getStatusCode(),
            'bodyLength' => sizeof($request->getBody()),
            'reqTime' => "{$time}s",
            'level' => 'REQUEST'
        ];

        if ($context['code'] >= 200 && $context['code'] <= 202) {
            $this->logger->info($data, $context);
        } elseif ($context['code'] >= 203 && $context['code'] < 400) {
            $this->logger->warning($data, $context);
        } else {
            $this->logger->error($data, $context);
        }

        return $response;
    }
}