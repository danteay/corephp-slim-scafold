<?php

return function($c) {
    $config = new \Doctrine\DBAL\Configuration();

    $params = array(
        'url' => $_ENV['DATABASE_URL']
    );

    $conn = \Doctrine\DBAL\DriverManager::getConnection($params, $config);

    $GLOBALS['database'] = $conn;

    return $conn;
};