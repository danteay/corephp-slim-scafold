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

// Application middleware

$app->add(new \Middlewares\IOMiddleware($container));
