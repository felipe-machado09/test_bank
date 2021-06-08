<?php

namespace Modules\Account\Entities\Actions;

use Modules\Account\Entities\Account;

final class ListAccountAction
{
    public function __invoke($filter)
    {
        $account = app(Account::class);

        $data =  $account->
            orderby('created_at','desc')->paginate(15);

        return $data;
    }
}
