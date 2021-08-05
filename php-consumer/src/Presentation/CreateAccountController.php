<?php

namespace PhpConsumer\Presentation;

use PhpConsumer\Data\Contracts\CreateAccount;

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
            $this->createAccount->create($request->account, $request->agency, $request->bank, $request->owner);
        } catch (\Throwable $exception) {
            var_dump(["error" => $exception->getMessage()]);
        }
    }

}