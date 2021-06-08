<?php

namespace Modules\Account\Entities\DataTransferObject;

use Modules\Account\Http\Requests\AccountRequest;
use Spatie\DataTransferObject\DataTransferObject;

class AccountData extends DataTransferObject
{
    //** @var integer */
    public $customer_id;

    //** @var string */
    public $balance;

    public static function fromRequest(AccountRequest $accountRequest ): AccountData
    {
        return new Self([
            'customer_id' => $accountRequest['customer_id'],
            'balance' => $accountRequest['balance'],
        ]);
    }
}
