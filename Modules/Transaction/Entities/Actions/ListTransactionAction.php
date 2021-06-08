<?php

namespace Modules\Transaction\Entities\Actions;

use Modules\Transaction\Entities\Transaction;

final class ListTransactionAction
{
    public function __invoke($filter)
    {
        $transaction = app(Transaction::class);


        $data =  $transaction->with(['payee','payer'])->
            orderby('created_at','desc')->paginate(15);

        return $data;
    }
}
