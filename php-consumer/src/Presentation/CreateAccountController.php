<?php

namespace PhpConsumer\Presentation;

use PhpConsumer\Data\Contracts\CreateAccount;
use PhpConsumer\Infra\Messaging\Kafka\KafkaProducer;

final class CreateAccountController
{
    private CreateAccount $createAccount;

    /**
     * @param CreateAccount $createAccount
     */
    public function __construct(CreateAccount $createAccount)
    {
        $this->createAccount = $createAccount;
    }

    public function handle(mixed $request) {
        try {
            var_dump(["Reading message..." => $request]);
            $account = $this->createAccount->create($request->account, $request->agency, $request->bank, $request->owner);
            $producer = new KafkaProducer();
            $producer->sendMessage(json_encode([
                "owner" => $account->getOwner(),
                "agency" => $account->getAgencyNumber(),
                "account" => $account->getAccountNumber(),
                "bank_name" => $account->getBankName()
            ]));
        } catch (\Throwable $exception) {
            var_dump(["error" => $exception->getMessage()]);
        }
    }

}
