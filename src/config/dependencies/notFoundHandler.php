<?php

use Slim\Http\Request;
use Slim\Http\Response;

return function ($c) {
    return function (Request $request, Response $response) use ($c) {
        return $c['renderer']->render($response, 'errors/404.phtml');
    };
};
