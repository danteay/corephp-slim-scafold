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
use Firebase\JWT\JWT;

/**
 * JWT middleware
 *
 * @category  Middleware
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2
 * @link      https://github.com/danteay/corephp-slim-scafold
 */
class JWTMiddleware
{
    /**
     * Logger instance
     *
     * @var \Predis\Client
     */
    private $logger;

    /**
     * Construct CorsMiddleware
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
     * @param Request  $req  The incoming request
     * @param Response $res  The HTTP response
     * @param callable $next The next middleware
     *
     * @return Response The HTTP response
     */
    public function __invoke(Request $req, Response $res, callable $next)
    {
        $keyHeader = getenv('KEYHEADER');
        $keyValue = $req->getHeaderLine($keyHeader);

        try {
            $decoded = JWT::decode(
                $keyValue,
                getenv('JWTKEY'),
                ['HS256']
            );
        } catch (Firebase\JWT\ExpiredException $e) {
            $data = [
                'code' => 401,
                'status' => 'error',
                'message' => 'unautorized',
                'data' => [
                    'trace' => ['invalid token']
                ]
            ];

            return $res->withJson($data, 401);
        } catch (\Exception $e) {
            $this->_logger->error($e->getMessage());

            $data = [
                'code' => 403,
                'status' => 'error',
                'message' => 'forbiden',
                'data' => [
                    'trace' => ['invalid token']
                ]
            ];

            return $res->withJson($data, 403);
        }

        return $next($req, $res);
    }
}
