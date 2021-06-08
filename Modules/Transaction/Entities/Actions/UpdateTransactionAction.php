<?php

namespace Modules\Transaction\Entities\Actions;

use Modules\Transaction\Entities\Transaction;
use Modules\Transaction\Entities\DataTransferObject\TransactionData;

final class UpdateTransactionAction
{
    public function __invoke(TransactionData $transactionData, $id)
    {
        $transactionContainer = app(Transaction::class);
        $data = $transactionContainer->findOrFail($id);

        $data->update([
            'payer_id' => $transactionData->payer_id ,
            'payee_id' => $transactionData->payee_id ,
            'value' => $transactionData->value ,
            'type_transaction' => $transactionData->type_transaction
        ]);

        return $data;
    }
}
