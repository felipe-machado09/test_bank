<?php

namespace Modules\Transaction\Entities\Actions;

use App\Helpers\Helpers;
use Illuminate\Support\Facades\DB;
use Modules\Account\Services\AccountService;
use Modules\Transaction\Entities\Transaction;
use Modules\Historic\Services\HistoricService;
use Modules\Transaction\Services\TransactionService;
use Modules\Transaction\Entities\DataTransferObject\TransactionData;
use Modules\Transaction\Entities\Actions\CheckUserCanTransactionAction;



final class CreateTransactionAction
{
    public function __invoke(TransactionData $transactionData)
    {
            DB::beginTransaction();

            $payer_id = $transactionData->payer_id;
            $payee_id = $transactionData->payee_id;
            $value = $transactionData->value;

            $getPayerAccount = TransactionService::getUserAccount($payer_id);
            $getPayeeAccount = TransactionService::getUserAccount($payee_id);



            $transactionAuthorized = TransactionService::transactionAuthrorized();

            $checkUserCanTransaction = TransactionService::checkUserCanTransaction($payer_id);

            $checkUserHasBalance = TransactionService::checkUserHasBalance($getPayerAccount->id, $value);

            if($checkUserCanTransaction == false){
                return 'Lojista não pode efetuar transferencia!';
                DB::rollBack();
            }

            if($checkUserHasBalance == false){
                return 'Saldo insuficiente para transferência!';
                DB::rollBack();
            }


            if($transactionAuthorized == true){


                $data = new Transaction;

                $data->payer_id = $payer_id;
                $data->payee_id = $transactionData->payee_id;
                $data->value = $value;
                $data->type_transaction = $transactionData->type_transaction;

                $data->save();

                AccountService::decreaseAccountBalanceAction($getPayerAccount->id, $value);
                AccountService::increaseAccountBalanceAction($getPayeeAccount->id, $value);

                $infoPayer = [];
                $infoPayer['account_id'] = $getPayerAccount->id;
                $infoPayer['payer_id'] = $payer_id;
                $infoPayer['payee_id'] = $payee_id;
                $infoPayer['previous_balance'] = floatval($getPayerAccount->balance);
                $infoPayer['future_balance'] = $getPayerAccount->balance - $value;
                $infoPayer['value'] = $value;
                $infoPayer['type_historic'] = 'Transfer';

                $infoPayee = [];

                $infoPayee['account_id'] = $getPayeeAccount->id;
                $infoPayee['payer_id'] = $payer_id;
                $infoPayee['payee_id'] = $payee_id;
                $infoPayee['previous_balance'] = floatval($getPayeeAccount->balance);
                $infoPayee['future_balance'] = $getPayeeAccount->balance + $value;
                $infoPayee['value'] = $value;
                $infoPayee['type_historic'] = 'Receivement';

                HistoricService::makeHistoric($infoPayer);
                HistoricService::makeHistoric($infoPayee);

                $checkServiceEmail = TransactionService::checkServiceEmail();

                if($checkServiceEmail == false){
                    return 'Serviço de email Indisponível!';
                    DB::rollBack();
                }

                DB::commit();
                return $data ;
            }else if($transactionAuthorized == false) {
                DB::rollBack();

                return 'Transação não Autorizada procure o suporte!';

            }else{
                DB::rollBack();

                return $transactionAuthorized;

            }




    }
}
