<?php

namespace PhpConsumer\Infra\Postgres;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;

class PostgresConnection
{
    private static ?EntityManager $connection = null;

    /**
     * @throws ORMException
     */
    public static function getEntityManager(): EntityManager
    {
        if (!self::$connection) {
            $isDevMode = true;
            $proxyDir = null;
            $cache = null;
            $useSimpleAnnotationReader = false;
            $config = Setup::createAnnotationMetadataConfiguration(array(
                __DIR__ . "/Entities"
            ), $isDevMode, $proxyDir,
                $cache, $useSimpleAnnotationReader);
            $conn = array(
                'driver' => 'pdo_pgsql',
                'user' => getenv('DB_USER'),
                'password' => getenv('DB_PASS'),
                'host' => getenv('DB_HOST'),
                'port' => intval(getenv('DB_PORT'))
            );
            self::$connection = EntityManager::create($conn, $config);
            return self::$connection;
        }
        return self::$connection;
    }
}