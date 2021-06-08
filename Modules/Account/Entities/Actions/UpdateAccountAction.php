<?php

namespace Modules\Account\Entities\Actions;

use Modules\Account\Entities\Account;
use Modules\Account\Entities\DataTransferObject\AccountData;

final class UpdateAccountAction
{
    public function __invoke(AccountData $accountData, $id)
    {
        $accountContainer = app(Account::class);
        $data = $accountContainer->findOrFail($id);

        $data->update([
            'customer_id' => $accountData->customer_id ,
            'balance' => $accountData->balance ,
        ]);

        return $data;
    }
}
