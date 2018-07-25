<?php

return function($c) {
    $config = new \Doctrine\DBAL\Configuration();
    $conn = null;
    
    $database = getenv('DATABASE_URL');

    if (empty($database)) {
        try {
            $params = array(
                'url' => $database
            );

            $conn = \Doctrine\DBAL\DriverManager::getConnection($params, $config);

            $GLOBALS['database'] = $conn;
        } catch (\Exception $e) {
            echo $e->getTraceAsString(); 
        }
    }

    return $conn;
};
