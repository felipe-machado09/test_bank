<?php

namespace Modules\Account\Entities\Actions;

use Modules\Account\Entities\Account;

final class GetUserAccountAction
{
    public function __invoke($payer_id)
    {

        $account = app(Account::class);

        $data = $account->where('customer_id', $payer_id)->first();

        return $data;
    }
}
