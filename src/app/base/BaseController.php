<?php

namespace Base;

use Interop\Container\ContainerInterface;

class BaseController
{
    protected $container;
    protected $logger;
    protected $view;
    protected $db;

    /**
     * BaseHandler constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->logger = $container->get('logger');
        $this->view = $container->get('renderer');
        $this->db = $container->get('database');
    }
}