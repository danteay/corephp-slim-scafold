<?php

use Slim\Http\Request;
use Slim\Http\Response;

return function ($c) {
    return function (Request $req, Response $res, \Exception $err) use ($c) {
        $view = $c->get('renderer');

        $args['message'] = $err->getMessage();
        $args['trace'] = $err->getTraceAsString();
        $args['showTrace'] = $c['settings']['displayErrorDetails'];

        return $view->render($res, 'errors/500.twig', $args);
    };
};
