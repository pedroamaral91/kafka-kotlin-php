<?php

require __DIR__ . '/../../vendor/autoload.php';

use PhpConsumer\Infra\Postgres\PostgresConnection;


final class DependencyFactory
{
    private static array $dependencies = [];

    public static function get(string $dependency)
    {
        if (!array_key_exists($dependency, self::$dependencies)) {
            self::$dependency();
        }
        return self::$dependencies[$dependency];
    }

    private static function account()
    {
        $entityManager = PostgresConnection::getEntityManager();
        $accountRepository = new \PhpConsumer\Infra\Postgres\Repositories\AccountRepository($entityManager);
        $createAccount = new \PhpConsumer\Data\Usecases\DbCreateAccount($accountRepository);
        $account = new \PhpConsumer\Presentation\CreateAccountController($createAccount);
        self::$dependencies = array_merge(self::$dependencies, ["account" => $account]);
    }
}
