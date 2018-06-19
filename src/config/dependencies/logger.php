<?php

return function ($c) {
    $settings = $c->get('settings')['logger'];

    $logger = new CorePHP\Log\Logger($_ENV['APPNAME']);
    $formatter = new CorePHP\Log\Formatters\WebFormatter();
    
    $file_handler = new CorePHP\Log\Handlers\FileHandler($settings['logfile']);
    $stdo_handler = new CorePHP\Log\Handlers\StdoutHandler(true);

    $file_handler->setFormatt($formatter);
    $stdo_handler->setFormatt($formatter);

    $logger->addHandler($file_handler);
    $logger->addHandler($stdo_handler);

    $GLOBALS['logger'] = $logger;

    return $logger;
};