<?php

namespace Modules\Account\Entities\Actions;

use Modules\Account\Entities\Account;



final class DecreaseAccountBalanceAction
{
    public function __invoke($account_id, $value)
    {
        $query = app(Account::class);

        $account = $query->find($account_id);

        $balance = $account->balance;

        $account->balance = floatval($balance) - $value;



        $account->update();

        return $account;
    }
}
