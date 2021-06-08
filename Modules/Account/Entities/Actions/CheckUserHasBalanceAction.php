<?php

namespace Modules\Account\Entities\Actions;

use Modules\User\Entities\User;
use Modules\Account\Entities\Account;



final class CheckUserHasBalanceAction
{
    public function __invoke($account_id, $value)
    {
        $response = false;
        $query = app(Account::class);

        $account = $query->findOrFail($account_id);

        $account->balance;

        if($account->balance >= $value){
            $response = true;
        }
        
        return $response;
    }
}
