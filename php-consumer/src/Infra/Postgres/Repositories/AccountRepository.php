<?php

namespace PhpConsumer\Infra\Postgres\Repositories;

use Doctrine\ORM\EntityManager;
use Exception;
use PhpConsumer\Data\Contracts\CreateAccountRepository;
use PhpConsumer\Domain\Usecases\Account;
use PhpConsumer\Infra\Postgres\Entities\AccountEntity;

class AccountRepository implements CreateAccountRepository
{
    private EntityManager $queryBuilder;

    /**
     * @param EntityManager $queryBuilder
     */
    public function __construct(EntityManager $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    /**
     * @throws Exception
     */
    public function save(Account $account): Account
    {
        try {
            $accountEntity = new AccountEntity($account->getAccountNumber(), $account->getAgencyNumber(), $account->getBankName(), $account->getOwner());
            $this->queryBuilder->persist($accountEntity);
            $this->queryBuilder->flush();
            return $account;
        } catch (\Throwable $exception) {
            var_dump(["exception" => $exception->getMessage()]);
            throw new Exception("error");
        }
    }
}