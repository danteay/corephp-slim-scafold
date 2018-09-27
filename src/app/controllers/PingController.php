<?php
/**
 * Ping endpoints controller
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

namespace Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Base\BaseController;
use Illuminate\Database\Eloquent\Model;

/**
 * PingController
 *
 * @category  Controller
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2
 * @link      https://github.com/danteay/corephp-slim-scafold
 */
class PingController extends BaseController
{
    /**
     * PingController Constrcut
     *
     * @param mixed $c Application context
     */
    public function __construct($c)
    {
        parent::__construct($c);
    }

    /**
     * Index endpint /
     *
     * @param Request  $req  The incoming request
     * @param Response $res  The HTTP response
     * @param array    $args Url rest arguments
     *
     * @return Response The HTTP response
     */
    public function index(Request $req, Response $res, $args)
    {
        return $this->view->render($res, 'index.twig', $args);
    }

    /**
     * Ping endpint /ping
     *
     * @param Request  $req  The incoming request
     * @param Response $res  The HTTP response
     * @param array    $args Url rest arguments
     *
     * @return Response The HTTP response
     */
    public function ping(Request $req, Response $res, $args)
    {
        $resp = [
            "object" => "receipts",
            "code" =>200,
            "status" => "success",
            "message" => "OK",
            "request" => time(),
            "url" => "/ping",
            "data" => "pong"
        ];

        $this->logger->info('Esto es un mensaje');

        return $res->withJson($resp, 200);
    }
}
