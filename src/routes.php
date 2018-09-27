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

define('ROUTESDIR', __DIR__ . '/config/routes');

$files = scandir(ROUTESDIR);

foreach ($files as $file) {
    if (preg_match('/\.php$/', $file) && is_file(ROUTESDIR . "/{$file}")) {
        require ROUTESDIR . "/{$file}";
    }
}
