<?php

namespace Modules\Account\Entities\Actions;

use App\Helpers\Helpers;
use Illuminate\Support\Facades\DB;
use Modules\Account\Entities\Account;
use Modules\Account\Services\AccountService;
use Modules\Account\Entities\DataTransferObject\AccountData;
use Modules\Account\Entities\Actions\CheckUserCanAccountAction;



final class CreateAccountAction
{
    public function __invoke(AccountData $accountData)
    {
        $data = new Account;

        $data->customer_id = $accountData->customer_id;
        $data->balance = $accountData->balance;
        $data->save();

        return $data ;
    }
}
