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

return function ($c) {
    return function (Request $request, Response $response) use ($c) {
        return $c['renderer']->render($response, 'errors/404.phtml');
    };
};
