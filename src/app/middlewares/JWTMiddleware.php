<?php

namespace Middlewares;

use Slim\Http\Request;
use Slim\Http\Response;
use Firebase\JWT\JWT;

class JWTMiddleware
{
    private $logger;

    /**
     * Construct CorsMiddleware
     *
     * @param mixed $c Application context
     */
    public function __construct($c)
    {
        $this->logger = $c->get('logger');
    }

    /**
     * Function that will be call for all incomming request and log the relevant information
     *
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return Response
     */
    public function __invoke(Request $req, Response $res, $next)
    {
        $keyHeader = getenv('KEYHEADER');
        $keyValue = $req->getHeaderLine($keyHeader);

        try {
            $decoded = JWT::decode($keyValue, getenv('JWTKEY'), ['HS256']);
        } catch(Firebase\JWT\ExpiredException $e) {
            return $res->withJson([
                'code' => 401,
                'status' => 'error',
                'message' => 'unautorized',
                'data' => [
                    'trace' => ['invalid token']
                ]
            ], 401);
        } catch(\Exception $e) {
            $this->logger->error($e->getMessage());
            return $res->withJson([
                'code' => 403,
                'status' => 'error',
                'message' => 'forbiden',
                'data' => [
                    'trace' => ['invalid token']
                ]
            ], 403);
        }

        return $next($req, $res);
    }
}