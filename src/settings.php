<?php
/**
 * Global settings for project configuration
 *
 * PHP Version 7.1
 *
 * @category  Settings
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2
 * @link      https://github.com/danteay/corephp-slim-scafold
 */

return [
    'settings' => [
        'displayErrorDetails' => strtolower(getenv('ERROR_DETAILS', 'true')) == 'true',
        'addContentLengthHeader' => false,
        'determineRouteBeforeAppMiddleware' => true,

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/views',
        ],

        // twig view settings
        'twig' => [
            'cache' => __DIR__ . '/views/cache',
            'auto_reload' => true
        ],

        // Monolog settings
        'logger' => [
            'name' => getenv('APPNAME', 'SLIM'),
            'level' => Monolog\Logger::DEBUG,
            // 'path' => __DIR__ . '/../logs/logs.log'
            'path' => 'php://stdout'
        ],

        #NEW_SETTINGS
    ]
];
