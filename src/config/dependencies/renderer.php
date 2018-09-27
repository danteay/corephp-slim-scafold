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

return function ($c) {
    $view = new \Slim\Views\Twig(
        $c['settings']['renderer']['template_path'],
        $c['settings']['twig']
    );

    // Instantiate and add Slim specific extension
    $basePath = rtrim(
        str_ireplace('index.php', '', $c->get('request')->getUri()->getBasePath()),
        '/'
    );

    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $basePath));

    return $view;
};
