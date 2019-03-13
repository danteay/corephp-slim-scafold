<?php
/**
 * Global settings for project configuration
 *
 * PHP Version 7.1
 *
 * @category  Dependency
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2
 * @link      https://github.com/danteay/corephp-slim-scafold
 */

use Slim\Http\Request;
use Slim\Http\Response;

return function ($container) {
    return function (Request $req, Response $res, \Exception $err) use ($container) {
        $args['status'] = 'error';
        $args['message'] = $err->getMessage();
        $args['code'] = 500;


        if ($container['settings']['displayErrorDetails']) {
            $args['trace'] = $err->getTraceAsString();
        }

        $logger = $container->get('logger');
        $logger->error($err->getMessage());
        $logger->error($err->getTraceAsString());

        return $res->withJson($args, 500);
    };
};
