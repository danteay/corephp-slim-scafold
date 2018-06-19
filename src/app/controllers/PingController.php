<?php

namespace Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Base\BaseController;

class PingController extends BaseController
{
    /**
     * Constrcut
     * @param mixed $c Application context
     */
    public function __construct($c)
    {
        parent::__construct($c);
    }

    /**
    * @param Request $req
    * @param Response $res
    * @param array $args
    * @return Response
    */
    public function index(Request $req, Response $res, $args)
    {
        return $this->view->render($res, 'index.phtml', $args);
    }

    /**
     * @param Request $req
     * @param Response $res
     * @param array $args
     * @return Response
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

        return $res->withJson($resp, 200);
    }
}