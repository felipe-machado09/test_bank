<?php

namespace Modules\Transaction\Services;

use Illuminate\Support\Facades\Http;
use Modules\Account\Entities\Actions\CreateAccountAction;
use Modules\Account\Entities\Actions\GetUserAccountAction;
use Modules\Account\Entities\DataTransferObject\AccountData;
use Modules\Account\Entities\Actions\CheckUserHasBalanceAction;
use Modules\Account\Entities\Actions\DecreaseAccountBalanceAction;
use Modules\Account\Entities\Actions\IncreaseAccountBalanceAction;
use Modules\Transaction\Entities\Actions\CheckUserCanTransactionAction;

class TransactionService
{
    public static function transactionAuthrorized(){
        try{
            $responseUrl = Http::get('https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6');

            $responseArray = $responseUrl->json();
            $response = '';

            if($responseArray['message'] == 'Autorizado'){
                $response = true;
            }else{
                $response = false;
            }

            return $response;

        }catch(Exception $e){
            return 'Autenticador com problema, tente novamente mais tarde!';
        }
    }

    public static function checkServiceEmail(){
        try{
            $responseUrl = Http::get('http://o4d9z.mocklab.io/notify');

            $responseArray = $responseUrl->json();
            $response = '';

            if($responseArray['message'] == 'Success'){
                $response = true;
            }else{
                $response = false;
            }

            return $response;

        }catch(Exception $e){
            return 'Serviço de email com problema, tente novamente mais tarde!';
        }
    }


    public static function checkUserCanTransaction($payer_id){
        try{

        $action = new CheckUserCanTransactionAction;

        $response = $action($payer_id);

        return  $response;

        }catch(Exception $e){
            return 'Autenticador com problema, tente novamente mais tarde!';
        }
    }

    public static function transactionAuthrorize(){

        $response = Http::get('http://o4d9z.mocklab.io/notify');

        return $response->json();

    }

    public static function checkUserHasBalance($account_id, $value){
        try{

        $action = new CheckUserHasBalanceAction;

        $response = $action($account_id, $value);

        return  $response;

        }catch(Exception $e){
            return 'Erro na checagem do saldo.';
        }
    }



    public static function getUserAccountId($account_id){
        try{
            $id = '';
            $customer_id = $account_id;
            $balance = 0.00;
            $account = '';
            $action = new GetUserAccountAction;


            $response = $action($account_id);

            if($response == null){

                $createAccount = new CreateAccountAction;
                $data = new AccountData;
                $data->customer_id = $customer_id;
                $data->balance = $balance;

                $account =  $createAccount($data);
                $id = $account->id;
            }else{
                $id = $response->id;
            }

            return  $id;

        }catch(Exception $e){
            return 'Este Usuário não possui conta!';
        }
    }
    public static function getUserAccount($account_id){
        try{
            $response = '';
            $customer_id = $account_id;
            $balance = 0.00;
            $account = '';
            $action = new GetUserAccountAction;


            $query = $action($account_id);

            if($query == null){

                $createAccount = new CreateAccountAction;
                $data = new AccountData;
                $data->customer_id = $customer_id;
                $data->balance = $balance;

                $account =  $createAccount($data);
                $response = $account;
            }else{
                $response = $query;
            }

            return  $response;

        }catch(Exception $e){
            return 'Este Usuário não possui conta!';
        }
    }





}
