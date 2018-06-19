<?php

return function($c) {
    $config = new \Doctrine\DBAL\Configuration();
    $conn = null;

    if (isset($_ENV['DATABASE_URL'])) {
        try {
            $params = array(
                'url' => $_ENV['DATABASE_URL']
            );

            $conn = \Doctrine\DBAL\DriverManager::getConnection($params, $config);

            $GLOBALS['database'] = $conn;
        } catch (\Exception $e) {
            echo $e->getTraceAsString(); 
        }
    }

    return $conn;
};