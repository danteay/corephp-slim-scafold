<?php

return function ($c) {
    $view = new \Slim\Views\Twig(
        $c['settings']['renderer']['template_path'],
        $c['settings']['twig']
    );

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $c->get('request')->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $basePath));

    return $view;
};
