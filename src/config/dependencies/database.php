<?php
/**
 * Global settings for project configuration
 *
 * PHP Version 7.1
 *
 * @category  Dependency
 * @package   CorePHP_Slim_Scafold
 * @author    Eduardo Aguilar <dante.aguilar41@gmail.com>
 * @copyright 2018 Eduardo Aguilar
 * @license   https://github.com/danteay/corephp-slim-scafold/LICENSE Apache-2
 * @link      https://github.com/danteay/corephp-slim-scafold
 */

return function ($c) {
    $database = getenv('DATABASE_URL');

    if (!empty($database)) {
        try {
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
