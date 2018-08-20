<?php

/**
 * Parse database URL into a valid Eloquent configuration
 *
 * @param string $url
 * @return void
 */
function parseDatabaseURL($url) {
    $options = [
        'driver' => null,
        'host' => null,
        'port' => null,
        'database' => null,
        'username' => null,
        'password' => null,
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci'
    ];

    $aux = explode('://', $url);

    switch ($aux[0]) {
        case 'postgres':
            $options['driver'] = 'pgsql';
            $options['port'] = 5432;
            break;
        case 'mysql':
            $options['driver'] = 'mysql';
            $options['port'] = 3306;
            break;
        default:
            throw new \Exception('Invalid database driver to parse url');
    }

    $aux = explode('@', $aux[1]);
    $auth = $aux[0];
    $host = $aux[1];

    $auth = explode(':', $auth);

    if (count($auth) == 0) {
        throw new \Exception('Invalid username for database url');
    }

    $options['username'] = $auth[0];

    if (count($auth) == 2) {
        $options['password'] = $auth[1];
    }

    $host = explode('/', $host);

    if (count($host) < 2) {
        throw new \Exception('Malformed database url');
    }

    $options['database'] = $host[1];
    $host = explode(':', $host[0]);

    $options['host'] = $host[0];

    if (count($host) == 2) {
        $options['port'] = $host[1];
    }

    return $options;
}

return function($c) {
    $database = getenv('DATABASE_URL');

    if (!empty($database)) {
        try {
            $options = parseDatabaseURL($database);

            $capsule = new \Illuminate\Database\Capsule\Manager;
            $capsule->addConnection($options);

            $capsule->setAsGlobal();
            $capsule->bootEloquent();

            return $capsule;
        } catch (\Exception $e) {
            echo $e->getTraceAsString();
        }
    }

    return null;
};
