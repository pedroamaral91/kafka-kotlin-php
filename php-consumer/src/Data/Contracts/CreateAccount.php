<?php

namespace PhpConsumer\Data\Contracts;

use PhpConsumer\Domain\Usecases\Account;

interface CreateAccount
{
    public function create(string $account_number, string $agency_number, string $bank_name, string $owner): Account;
}