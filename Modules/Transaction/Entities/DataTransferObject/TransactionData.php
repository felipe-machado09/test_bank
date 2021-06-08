<?php

namespace Modules\Transaction\Entities\DataTransferObject;

use Modules\Transaction\Http\Requests\TransactionRequest;
use Spatie\DataTransferObject\DataTransferObject;

class TransactionData extends DataTransferObject
{
    //** @var integer */
    public $payer_id;

    //** @var integer */
    public $payee_id;

    //** @var string */
    public $value;

    //** @var string */
    public $type_transaction;


    public static function fromRequest(TransactionRequest $transactionRequest ): TransactionData
    {
        return new Self([
            'payer_id' => $transactionRequest['payer_id'],
            'payee_id' => $transactionRequest['payee_id'],
            'value' => $transactionRequest['value'],
            'type_transaction' => $transactionRequest['type_transaction'],

        ]);
    }
}
