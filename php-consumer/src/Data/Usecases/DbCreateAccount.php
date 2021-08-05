<?php

namespace PhpConsumer\Data\Usecases;

use PhpConsumer\Data\Contracts\CreateAccount;
use PhpConsumer\Data\Contracts\CreateAccountRepository;
use PhpConsumer\Domain\Usecases\Account;

class DbCreateAccount implements CreateAccount
{
    private CreateAccountRepository $createAccountRepository;

    /**
     * @param CreateAccountRepository $createAccountRepository
     */
    public function __construct(CreateAccountRepository $createAccountRepository)
    {
        $this->createAccountRepository = $createAccountRepository;
    }

    public function create(string $account_number, string $agency_number, string $bank_name, string $owner): Account
    {
        $account = new Account($agency_number, $account_number, $bank_name, $owner);
        $this->createAccountRepository->save($account);
        return $account;
    }
}