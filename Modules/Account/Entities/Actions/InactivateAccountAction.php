<?php

namespace Modules\Account\Entities\Actions;

use Modules\Account\Entities\Account;

final class InactivateAccountAction
{
    public function __invoke($id)
    {
        $account = app(Account::class);
        $data = $account->findOrFail($id);

        $data->delete();

        return null;

    }
}
