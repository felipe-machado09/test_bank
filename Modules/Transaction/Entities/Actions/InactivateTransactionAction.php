<?php

namespace Modules\Transaction\Entities\Actions;

use Modules\Transaction\Entities\Transaction;

final class InactivateTransactionAction
{
    public function __invoke($id)
    {
        $transaction = app(Transaction::class);
        $data = $transaction->findOrFail($id);

        $data->delete();

        return null;

    }
}
