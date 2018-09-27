<?php
/**
 * Global CORS middleware
 *
 * PHP Version 7.1
 *
 * @category  Scafolding
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2
 * @link      https://github.com/danteay/corephp-slim-scafold
 */

namespace Middlewares;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Cors middleware
 *
 * @category  Middleware
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2
 * @link      https://github.com/danteay/corephp-slim-scafold
 */
class CorsMiddleware
{
    /**
     * Function that will be call for all incomming request and log the relevant
     * information
     *
     * @param Request  $request  The incoming request
     * @param Response $response The HTTP response
     * @param callable $next     The next middleware
     *
     * @return Response The HTTP response
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $response = $next($request, $response);
        return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', '*')
            ->withHeader('Access-Control-Allow-Methods', '*');
    }
}
