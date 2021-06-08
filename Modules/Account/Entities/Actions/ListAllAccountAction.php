<?php

namespace Modules\Account\Entities\Actions;

use Modules\Account\Entities\Account;

final class ListAllAccountAction
{
    public function __invoke($filter = null)
    {
        $account = app(Account::class);

        $data =  $account->orderby('created_at','desc')->get();

        return $data;
    }
}
