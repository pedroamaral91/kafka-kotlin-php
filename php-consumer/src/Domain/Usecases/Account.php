<?php

namespace PhpConsumer\Domain\Usecases;

class Account
{
    private string $agency_number;
    private string $account_number;
    private string $bank_name;
    private string $owner;

    public function __construct(
        string $agency_number,
        string $account_number,
        string $bank_name,
        string $owner
    ) {
        $this->account_number = $account_number;
        $this->agency_number = $agency_number;
        $this->bank_name = $bank_name;
        $this->owner = $owner;
    }

    /**
     * @return string
     */
    public function getOwner(): string
    {
        return $this->owner;
    }

    /**
     * @return string
     */
    public function getAgencyNumber(): string
    {
        return $this->agency_number;
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->account_number;
    }

    /**
     * @return string
     */
    public function getBankName(): string
    {
        return $this->bank_name;
    }


}