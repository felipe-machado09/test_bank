<?php

namespace Modules\Historic\Services;

use Illuminate\Support\Facades\Http;
use Modules\Historic\Entities\Actions\CreateHistoricAction;
use Modules\Historic\Entities\DataTransferObject\HistoricData;

class HistoricService
{
    public static function makeHistoric( $info ){
        try{
            $data = new HistoricData;
            $data->account_id = $info['account_id'];
            $data->payer_id = $info['payer_id'];
            $data->payee_id = $info['payee_id'];
            $data->previous_balance = $info['previous_balance'];
            $data->future_balance = $info['future_balance'];
            $data->value = $info['value'];
            $data->type_historic = $info['type_historic'];
            $action = new CreateHistoricAction;

            $response = $action($data);

            return  $response;

        }catch(Exception $e){
            return 'Ocorreu um erro na criação de Historico!';
        }
    }

}
