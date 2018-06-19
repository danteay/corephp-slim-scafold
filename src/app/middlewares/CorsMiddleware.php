<?php 

namespace Middlewares;

use Slim\Http\Request;
use Slim\Http\Response;

class CorsMiddleware
{
    private $logger;

    /**
     * Construct CorsMiddleware
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
    public function __invoke(Request $req, Response $res, $next)
    {
        $response = $next($req, $res);
        return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', '*')
            ->withHeader('Access-Control-Allow-Methods', '*');
    }
}