<?php
/**
 * Global settings for project configuration
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

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * IO logs middleware
 *
 * @category  Middleware
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2
 * @link      https://github.com/danteay/corephp-slim-scafold
 */
class IOMiddleware
{
    private $logger;

    /**
     * Construct IOMiddleware
     *
     * @param ContainerInterface $context Application context
     */
    public function __construct(ContainerInterface $context)
    {
        $this->logger = $context->get('logger');
    }

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

        $code = $response->getStatusCode();

        $context = [
            'method' => $request->getMethod(),
            'body' => $request->getParsedBody(),
            'headers' => $request->getHeaders()
        ];

        if ($code >= 200 && $code <= 202) {
            $this->logger->info($data, $context);
        } elseif ($code >= 203 && $code<= 400) {
            $this->logger->warning($data, $context);
        } else {
            $this->logger->error($data, $context);
        }

        return $response;
    }
}
