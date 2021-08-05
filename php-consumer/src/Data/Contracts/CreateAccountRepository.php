<?php

namespace PhpConsumer\Data\Contracts;

use PhpConsumer\Domain\Usecases\Account;

interface CreateAccountRepository
{
    public function save(Account $account): Account;
}