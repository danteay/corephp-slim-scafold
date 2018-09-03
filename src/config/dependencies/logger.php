<?php

return function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger(strtoupper($settings['name']));
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};
