<?php
/**
 * BaseController with the general configurations of the controllers
 *
 * PHP Version 7.1
 *
 * @category  Controller
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2.0
 * @link      https://github.com/danteay/corephp-slim-scafold
 */

namespace Base;

use Interop\Container\ContainerInterface;
use Helpers\ExceptionsHelper;

/**
 * BaseController
 *
 * @category  Base
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2.0
 * @link      https://github.com/danteay/corephp-slim-scafold
 */
class BaseController
{
    use ExceptionsHelper;

    /**
     * Top level app container instance
     *
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Log Interface instance
     *
     * @var \CorePHP\Log\Logger
     */
    protected $logger;

    /**
     * Redis client instance
     *
     * @var \Predis\Client
     */
    protected $redis;

    /**
     * Templating Engine instance
     *
     * @var \Slim\Views\Twig
     */
    protected $view;

    /**
     * Database instance
     *
     * @var \Illuminate\Database\Capsule\Manager
     */
    protected $db;

    /**
     * BaseHandler constructor.
     *
     * @param ContainerInterface $container Application Context
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->logger = $container->get('logger');
    }
    
}
