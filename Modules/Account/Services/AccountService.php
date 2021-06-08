<?php

namespace Modules\Account\Services;

use Modules\Account\Entities\Actions\DecreaseAccountBalanceAction;
use Modules\Account\Entities\Actions\IncreaseAccountBalanceAction;


class AccountService
{
    public static function decreaseAccountBalanceAction($account_id, $value){
        try{

        $action = new DecreaseAccountBalanceAction;

        $response = $action($account_id, $value);

        return  $response;

        }catch(Exception $e){
            return 'Erro na subtração do saldo.';
        }
    }

    public static function increaseAccountBalanceAction($account_id, $value){
        try{

        $action = new IncreaseAccountBalanceAction;

        $response = $action($account_id, $value);

        return  $response;

        }catch(Exception $e){
            return 'Erro na soma do saldo.';
        }
    }

}
