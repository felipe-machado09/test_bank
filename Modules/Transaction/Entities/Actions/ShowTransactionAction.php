<?php

namespace Modules\Transaction\Entities\Actions;

use Modules\Transaction\Entities\Transaction;



final class ShowTransactionAction
{
    public function __invoke($id)
    {
        $transaction = app(Transaction::class);
        $data = $transaction->findOrFail($id);

        return $data;
    }
}
