<?php

namespace Modules\Account\Entities\Actions;

use Modules\Account\Entities\Account;



final class ShowAccountAction
{
    public function __invoke($id)
    {
        $account = app(Account::class);
        $data = $account->findOrFail($id);

        return $data;
    }
}
