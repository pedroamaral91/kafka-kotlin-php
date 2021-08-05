<?php

namespace PhpConsumer\Infra\Postgres\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(schema="cleanarchkotlin", name="accounts")
 **/
class AccountEntity
{
    /**
     * @ORM\Id @ORM\Column(name="account_id", type="integer")
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     */
    private int $id;

    /** @ORM\Column(type="string") * */
    private string $account_number;

    /** @ORM\Column(type="string") * */
    private string $agency_number;

    /** @ORM\Column(type="string") * */
    private string $bank_name;

    /** @ORM\Column(type="string") * */
    private string $owner;

    /**
     * @param string $account_number
     * @param string $agency_number
     * @param string $bank_name
     */
    public function __construct(string $account_number, string $agency_number, string $bank_name, string $owner)
    {
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
     * @param string $owner
     */
    public function setOwner(string $owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->account_number;
    }

    /**
     * @param string $account_number
     */
    public function setAccountNumber(string $account_number): void
    {
        $this->account_number = $account_number;
    }

    /**
     * @return string
     */
    public function getAgencyNumber(): string
    {
        return $this->agency_number;
    }

    /**
     * @param string $agency_number
     */
    public function setAgencyNumber(string $agency_number): void
    {
        $this->agency_number = $agency_number;
    }

    /**
     * @return string
     */
    public function getBankName(): string
    {
        return $this->bank_name;
    }

    /**
     * @param string $bank_name
     */
    public function setBankName(string $bank_name): void
    {
        $this->bank_name = $bank_name;
    }
}