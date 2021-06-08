<?php

namespace Modules\Transaction\Entities\Actions;

use Modules\Transaction\Entities\Transaction;

final class ListAllTransactionAction
{
    public function __invoke($filter = null)
    {
        $transaction = app(Transaction::class);

        $data =  $transaction->with(['payee','payer'])->
        orderby('created_at','desc')->get();

        return $data;
    }
}
